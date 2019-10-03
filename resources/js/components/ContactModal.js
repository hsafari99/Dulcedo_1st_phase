import React, { Component } from "react";
import { Modal, Button } from "react-bootstrap";
import ModalResult from "./simpleComponents/ModalResult";

class ContactModal extends Component {
    constructor(props) {
        super(props);
        this.state = {
            showModal: true
        };
        this.close = this.close.bind(this);
        this.showContacts = this.showContacts.bind(this);
        this.retrieveContactId = this.retrieveContactId.bind(this);
        this.passId = this.passId.bind(this);
    }

    close() {
        this.setState({ showModal: false });
    }

    retrieveContactId(event) {
        console.log(event.target.name);
    }

    showContacts() {
        console.log("Here");
        this.props.list.map(contact => { });
    }

    passId(ID) {
        this.props.getid(ID);
    }

    render() {
        return (<Modal show={this.state.showModal} onHide={this.close} getid={this.passId}>
            <Modal.Header closeButton className="bg-success" >
                <Modal.Title > <h5>Search Results...</h5>
                </Modal.Title>
            </Modal.Header>
            <Modal.Body >
                {this.props.result.length == 0 ?
                    <span className="text-danger" >
                        No Result matches your criteria!
                    </span> :
                    this.props.result.map((contact, index) => <ModalResult
                        id={contact._id}
                        firstname={contact.firstname}
                        lastname={contact.lastname}
                        key={index}
                        email={contact.email} />)}
            </Modal.Body>
        </Modal>);
    }
}
export default ContactModal;