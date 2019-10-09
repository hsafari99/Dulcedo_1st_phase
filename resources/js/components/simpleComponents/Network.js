
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
        }

        removeMe() {
                this.props.removeMe(this.props.id);
        }

        setNetwork(event) {
                this.setState({ network: event.target.value });
                this.props.setSocialMedia(this.props.id, this.state.network, this.state.username);
        }

        setUsername(event) {
                this.setState({ username: event.target.value });
                this.props.setSocialMedia(this.props.id, this.state.network, this.state.username);
        }

        render() {
                let media = 'media' + this.props.id;
                let username = 'username' + this.props.id;
                let network = 'network' + this.props.id;

                return (
                        <tr id={network}>
                                <td
                                        className="p-0">
                                        <input
                                                type="text"
                                                className="w-100 pt-2"
                                                id={media}
                                                onChange={this.setNetwork}
                                        />
                                </td>
                                <td
                                        className="p-0">
                                        <input

                                                type="text"
                                                className="w-100 pt-2"
                                                id={username}
                                                onChange={this.setUsername}
                                        />
                                </td>
                                <td
                                        className="p-0">
                                        <span
                                                name={this.props.id}
                                                className="btn btn-danger w-100"
                                                onClick={this.removeMe}>
                                                Remove
                                                </span>
                                </td>
                        </tr>
                );
        }
}

export default Network;