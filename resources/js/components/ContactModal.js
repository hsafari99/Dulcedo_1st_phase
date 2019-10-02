import React, {Component} from 'react';
import Modal from 'react-bootstrap/Modal';
import Button from 'react-bootstrap/Button';

class ContactModal extends Component{
        constructor(props){
                // var result = JSON.parse(this.props.list);
                // console.log(result);
                super(props);
                this.state={
                    showModal: this.props.hiding,
                    hideDiv: true,
                //     list : result    
                }
                this.close = this.close.bind(this);
                this.showContacts = this.showContacts.bind(this);
                this.retrieveContactId = this.retrieveContactId.bind(this);
        }

        close() {
        this.setState({ hideDiv: false });
        this.setState({ showModal: false });
        }

        retrieveContactId(event){
                console.log(event.target.name);
        }

        showContacts(){
                this.props.list.map((contact) => {
                        <div className="bg-info" name={contact._id} key={contact._id} onClick={this.retrieveContactId}>
                                <span className="font-weight-bold text-dark">Full Name:</span>{contact.firstname}&nbsp; &nbsp;{contact.lastname}
                                <span className="font-weight-bold text-dark">Email: </span>{contact.email}
                        </div>
                });
        }

        render() {
                return (
                <div>
                        <Modal show={this.props.hiding && this.state.hideDiv} onHide={this.close}>
                        <Modal.Header closeButton className="bg-success">
                        <Modal.Title>Modal heading</Modal.Title>
                        </Modal.Header>
                        <Modal.Body id="contactResult">
                               {this.props.list.map((contact, index) => (<span key= {index}>test</span>))}
                        </Modal.Body>
                        </Modal>
                </div>
                );
        }

}

export default ContactModal;