import React, { Component } from 'react'
import { Modal } from "react-bootstrap";

class CmToInchesModal extends Component {
        constructor(props) {
                super(props);
                this.state = {
                        showModal: this.props.hideModal,
                }

        }

        handleClose() {
                this.props.hideModal();
        }

        render() {
                return (
                        <Modal show={!this.state.showModal} onHide={this.handleClose}>
                                <Modal.Header closeButton>
                                        <Modal.Title>
                                                <h5
                                                        className="modal-title">
                                                        Cm To Inches converter
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
                                                                Length in Cm:
                                                                                </span>
                                                </div>
                                                <input
                                                        type="number"
                                                        name="cmNumber"
                                                        className="form-control"
                                                        placeholder="Please enter the length in centi meters..."
                                                        onchange="convertcmToInches()" />
                                                <span
                                                        className="btn btn-info w-100 my-2">
                                                        Convert
                                                                        </span>
                                        </div>
                                </Modal.Body>
                        </Modal>
                );
        }

}

export default CmToInchesModal;