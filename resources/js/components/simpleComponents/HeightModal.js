import React, { Component } from 'react'
import { Modal } from "react-bootstrap";

class HeightModal extends Component {
        constructor(props) {
                super(props);
                this.state = {
                }
                this.handleClose = this.handleClose.bind(this);
                this.convertcmToInches = this.convertcmToInches.bind(this);
        }

        handleClose() {
                this.props.hideModal();
        }

        convertcmToInches() {
                let cm = parseFloat(document.getElementById("cmNumber").value);
                let ft = Math.floor(cm / 30.48);
                let inch = Math.floor((cm - (ft * 30.48)) / 2.54);
                let remainder = Math.floor(((cm - ((ft * 30.48) + (inch * 2.54))) / 2.54) * 4);

                this.props.setFt(ft);
                this.props.setInch(inch, remainder);
                this.handleClose();
        }

        render() {
                return (
                        <Modal show={true} onHide={this.handleClose}>
                                <Modal.Header closeButton className="bg-info text-dark">
                                        <Modal.Title>
                                                <h5
                                                        className="modal-title">
                                                        Height converter
                                                </h5>
                                        </Modal.Title>
                                </Modal.Header>
                                <Modal.Body
                                        className="modal-body bg-light">
                                        <div
                                                className="input-group my-1">
                                                <div
                                                        className="input-group-prepend">
                                                        <span
                                                                className="input-group-text d-block new_talent_subscription_form">
                                                                Height in Cm:
                                                                </span>
                                                </div>
                                                <input
                                                        id="cmNumber"
                                                        type="number"
                                                        name="cmNumber"
                                                        className="form-control"
                                                        placeholder="Please enter the height in centi meters..." />
                                                <span
                                                        className="btn btn-info w-100 my-2"
                                                        onClick={this.convertcmToInches}>
                                                        Convert
                                                        </span>
                                        </div>
                                </Modal.Body>
                        </Modal>
                );
        }

}

export default HeightModal;