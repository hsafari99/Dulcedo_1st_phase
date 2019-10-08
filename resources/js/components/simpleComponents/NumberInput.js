import React, { Component } from 'react'
import CmToInchesModal from './cmToInchesModal';

class NumberInput extends Component {
        constructor(props) {
                super(props);
                this.state = {
                        classname: (this.props.withToolTip) ? 'input-group-prepend showPointer' : 'input-group-prepend',
                        value: '',
                        hideModal: true,
                }
                this.handleChange = this.handleChange.bind(this);
                this.setValue = this.setValue.bind(this);
                this.hideModal = this.hideModal.bind(this);
                this.showModal = this.showModal.bind(this);
        }

        handleChange(event) {
                if (event.target.value) {
                        this.setState({ value: parseFloat(event.target.value) });
                        this.props.setNumberValue(this.props.title, parseFloat(event.target.value));
                } else {

                }
        }

        setValue() {
                this.setState({ value: parseFloat(event.target.value) });
        }

        hideModal() {
                this.setState({ hideModal: true });
        }

        showModal() {
                if (event.target.name != 'dress' && event.target.name != 'shoe') {
                        this.props.showModal(this.props.title);
                }
        }

        render() {
                return (
                        <div
                                className="input-group my-1">
                                <div
                                        className={this.state.classname}
                                        name={this.props.title}
                                        onClick={this.showModal}>
                                        <span
                                                name={this.props.title}
                                                className="input-group-text d-block new_talent_subscription_form">
                                                <i
                                                        name={this.props.title}
                                                        hidden={!this.props.withToolTip}
                                                        className="fas fa-info-circle text-dark"
                                                        data-toggle="tooltip"
                                                        title="Please click to convert cm to ft!">
                                                </i>
                                                &nbsp;{this.props.title}:
                                                </span>
                                </div>
                                <input
                                        type="number"
                                        name={this.props.title}
                                        className="form-control"
                                        placeholder={this.props.placeholder}
                                        onChange={this.handleChange}
                                        value={this.state.value}
                                />
                                <CmToInchesModal hideModal={this.state.hideModal} hideModal={this.hideModal} />
                        </div>
                );
        }

}

export default NumberInput;