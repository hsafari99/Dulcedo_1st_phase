
import React, { Component } from 'react';
import ScoutData from './ScoutData';

class ScoutPage extends Component {
        constructor(props) {
                super(props);
                this.state = {
                        isScouted: this.props.isScouted,
                        scoutList: [],
                }
                this.getOffice = this.getOffice.bind(this);
                this.getScoutId = this.getScoutId.bind(this);
                this.handleChange = this.handleChange.bind(this);
        }

        getOffice(office) {
                this.props.getOffice(office);

                $.ajax({
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/getScoutList",
                        method: 'POST',
                        data: {
                                office_id: office
                        },
                        success: function (result) {
                                var test = JSON.parse(result);
                                this.setState({ scoutList: test });
                        }.bind(this)
                });
        }

        getScoutId(id) {
                this.props.getScout(id);
        }

        handleChange() {
                this.setState((state, props) => ({
                        isScouted: !state.isScouted,
                }));
        }

        render() {
                return (
                        <fieldset className="border border-dark rounded p-3 my-3 shadow" id="scoutInfo">
                                <legend
                                        className="w-50 pl-2">
                                        <i className="fas fa-address-book text-success awsomeFonts"></i>
                                        Scout Information
                                </legend>
                                <label htmlFor="ifScouted" className="pl-4 showPointer">
                                        <input
                                                type="checkbox"
                                                className="form-check-input"
                                                id="ifScouted"
                                                onChange={this.handleChange}
                                                checked={this.state.isScouted}
                                        />
                                        <span className="font-weight-bold text-success">
                                                Talent <u>NOT</u> Scouted:
                                                </span>
                                </label>
                                {(this.state.isScouted) ? '' : (
                                        <ScoutData office={this.getOffice} scoutId={this.getScoutId} list={this.state.scoutList} />
                                )
                                }
                        </fieldset>
                );
        }
}

export default ScoutPage;