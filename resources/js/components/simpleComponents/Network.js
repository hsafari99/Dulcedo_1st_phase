
import React, { Component } from 'react';
import $ from 'jquery';

class Network extends Component {
        constructor(props) {
                super(props);
                this.state = {
                        network: '',
                        username: '',
                }
                this.removeMe = this.removeMe.bind(this);
                this.setNetwork = this.setNetwork.bind(this);
                this.setUsername = this.setUsername.bind(this);
                this.finalizeMe = this.finalizeMe.bind(this);
        }

        removeMe() {
                this.props.removeMe(this.props.id);
        }

        setNetwork(event) {
                this.setState({ network: event.target.value });
                // this.props.setSocialMedia(this.props.id, this.state.network, this.state.username);
        }

        setUsername(event) {
                this.setState({ username: event.target.value });
                //this.props.setSocialMedia(this.props.id, this.state.network, this.state.username);
        }

        finalizeMe() {
                if (this.state.network && this.state.username) {
                        this.props.setSocialMedia(this.props.id, this.state.network, this.state.username);
                        let media = 'media' + this.props.id;
                        let username = 'username' + this.props.id;

                        let network1 = document.getElementById(media).disabled = true;
                        let username1 = document.getElementById(username).disabled = true;
                }
        }

        render() {
                let media = 'media' + this.props.id;
                let username = 'username' + this.props.id;
                let network = 'network' + this.props.id;

                return (
                        <tr id={network} className='vertical-align-center'>
                                <td
                                        className="p-0">
                                        <input
                                                type="text"
                                                className="w-100 pt-2"
                                                id={media}
                                                onChange={this.setNetwork}
                                                value={this.state.network}
                                        />
                                </td>
                                <td
                                        className="p-0">
                                        <input

                                                type="text"
                                                className="w-100 pt-2"
                                                id={username}
                                                onChange={this.setUsername}
                                                value={this.state.username}
                                        />
                                </td>
                                <td
                                        className="p-0 row m-0">
                                        <span
                                                name={this.props.id}
                                                className="p-0 m-0 btn col showPointer awsomeButton"
                                                onClick={this.removeMe}>
                                                <i className="fas fa-times text-danger font-weight-bold"></i>
                                        </span>
                                        <span
                                                name={this.props.id}
                                                className="p-0 m-0 btn col showPointer awsomeButton"
                                                onClick={this.finalizeMe}>
                                                <i className="fas fa-check text-success font-weight-bold"></i>
                                        </span>
                                </td>
                        </tr>
                );
        }
}

export default Network;