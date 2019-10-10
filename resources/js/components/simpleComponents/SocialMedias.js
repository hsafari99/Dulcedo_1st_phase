
import React, { Component } from 'react';
import $ from 'jquery';
import Network from './Network';

var networkCounter = 0;

class SocialMedias extends Component {
        constructor(props) {
                super(props);
                this.state = {
                        networks: [],
                        rows: [],
                }
                this.addNetwork = this.addNetwork.bind(this);
                this.removeMe = this.removeMe.bind(this);
                this.recordSocialMedias = this.recordSocialMedias.bind(this);
                this.setSocialMedia = this.setSocialMedia.bind(this);
        }

        addNetwork() {
                let newRows = this.state.rows;
                let newNetworks = this.state.networks;

                newRows.push(networkCounter);
                newNetworks.push({
                        id: networkCounter,
                        network: '',
                        username: '',

                });

                this.setState({ rows: newRows });
                this.setState({ networks: newNetworks });
                networkCounter++;
        }

        removeMe(id) {
                let network = 'network' + id;
                document.getElementById(network).style.display = "none";

                let rows = this.state.rows;
                let networks = this.state.networks;

                delete networks[id];
                delete rows[id];
                this.setState({ rows: rows });
                this.setState({ networks: networks });
        }

        recordSocialMedias() {
                let networks = [];
                this.state.networks.map((network, index) => {
                        if (network && network.network && network.username) {
                                networks.push({
                                        network: network.network,
                                        username: network.username,
                                });
                        }
                });
                this.props.recordSocialMedias(networks);
        }

        setSocialMedia(id, network, username) {
                let oldNetworks = this.state.networks;

                if (oldNetworks.length < id) {
                        oldNetworks.push({
                                id: id,
                                network: network,
                                username: username
                        });
                } else {
                        oldNetworks[id] = {
                                id: id,
                                network: network,
                                username: username
                        }
                }

                this.setState({ networks: oldNetworks });
        }

        render() {
                return (
                        <fieldset
                                className="border border-dark rounded p-3 my-3 shadow"
                                id="socialMedia">
                                <legend
                                        className="w-50 pl-2">
                                        <i
                                                className="fas fa-thumbs-up text-success awsomeFonts">
                                        </i>
                                        Social Medias
                                        </legend>
                                <div
                                        className="input-group my-1">
                                        <div
                                                className="input-group-prepend">
                                                <span
                                                        className="input-group-text d-block new_talent_subscription_form">
                                                        Networks:
                                                        </span>
                                        </div>
                                        <span
                                                id='addNetwork'
                                                className="form-control btn btn-warning showPointer"
                                                onClick={this.addNetwork}>
                                                <i
                                                        className="far fa-plus-square text-danger awsomeFonts">
                                                </i>
                                        </span>
                                </div>
                                <div
                                        className="input-group my-1 text-center">
                                        <table
                                                className="table table-striped table-bordered table-hover"
                                                id="network">
                                                <thead>
                                                        <tr
                                                                className="table-info">
                                                                <th>
                                                                        Name
                                                                </th>
                                                                <th>
                                                                        username
                                                                </th>
                                                                <th>
                                                                        Action
                                                                </th>
                                                        </tr>
                                                </thead>
                                                <tbody
                                                        id="networkList">
                                                        {
                                                                this.state.rows.map((row, index) =>
                                                                        <Network
                                                                                id={index}
                                                                                key={index}
                                                                                removeMe={this.removeMe}
                                                                                setSocialMedia={this.setSocialMedia} />)
                                                        }
                                                </tbody>
                                        </table>
                                </div>
                                <span className="w-100 btn btn-success" onClick={this.recordSocialMedias}>Save the Social Medias</span>
                        </fieldset>
                );
        }
}

export default SocialMedias;