
import React, { Component } from 'react';
import { Alert } from "react-bootstrap";
import Input from './Input';
import ContactModal from './../ContactModal';

class Event extends Component {
        constructor(props) {
                super(props);
                this.state = {
                        search: '',
                        eventResult: [],
                        hideModal: true,
                        isclicked: false,
                        placeHolder: "Please search the event by name to find the ID...",
                }
                this.setValue = this.setValue.bind(this);
                this.handleSearch = this.handleSearch.bind(this);
                this.handleChange = this.handleChange.bind(this);
                this.resetModal = this.resetModal.bind(this);
                this.retrieveid = this.retrieveid.bind(this);
        }

        setValue(title, value) {
                this.setState({ search: value });
        }

        handleSearch() {
                $.ajax({
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/getEvents",
                        method: 'POST',
                        data: {
                                event: this.state.search
                        },
                        success: function (result) {
                                var test = JSON.parse(result);
                                this.setState({ eventResult: test });
                                this.setState({ hideModal: false });
                                this.setState({ enabled: false });
                        }.bind(this)
                });
        }

        handleChange() {
                this.setState({ search: '' });
                this.props.resetEvent();
        }

        resetModal() {
                this.setState({ hideModal: true });
                this.setState({ search: '' });
        }

        retrieveid(id) {
                this.props.setEventId(id);
                this.setState({ search: id });

        }

        render() {
                return (
                        <fieldset className="border border-dark rounded p-3 my-3 shadow" id="scoutInfo">
                                <legend
                                        className="w-50 pl-2">
                                        <i className="fas fa-calendar-alt text-danger awsomeFonts"></i>
                                        &nbsp; Event Information
                                </legend>

                                {this.props.id == '' ? (
                                        <div>
                                                <Input
                                                        title='event'
                                                        setValue={this.setValue}
                                                        placeholder={this.state.placeHolder}
                                                        id={this.props.id}
                                                />
                                                <div className="input-group my-1">
                                                        <span
                                                                className="btn btn-info w-100"
                                                                onClick={this.handleSearch}>
                                                                <i className="fas fa-search text-danger awsomeFonts"></i>
                                                                Find Event
                                                        </span>
                                                </div>
                                        </div>
                                ) : (
                                                <span
                                                        className='text-success p-2 bg-light'>
                                                        Event&nbsp;
                                                        <span
                                                                className='font-weight-bold text-danger'>
                                                                <u>{this.props.id}</u>
                                                        </span>
                                                        &nbsp;added successfully!
                                                </span>
                                        )}
                                <div className="input-group my-1">
                                        <label htmlFor="chkbox" className="pl-4 showPointer">
                                                <input
                                                        type="checkbox"
                                                        className="form-check-input"
                                                        id="chkbox"
                                                        onChange={this.handleChange}
                                                        checked={this.state.isclicked} />
                                                <span className="font-weight-bold text-secondary">
                                                        Search Again
                                                </span>
                                        </label>
                                </div>
                                {this.state.hideModal ? ("") : (<ContactModal result={this.state.eventResult} getid={this.retrieveid} hideModal={this.resetModal} showWhat='events' />)}
                        </fieldset>
                );
        }
}

export default Event;