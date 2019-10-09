import React, { Component } from 'react';
import HeightModal from './HeightModal';

class HeightSelector extends Component {
        constructor(props) {
                super(props);
                this.state = {
                        hideModal: true,
                }
                this.handleFtChange = this.handleFtChange.bind(this);
                this.handleInchChange = this.handleInchChange.bind(this);
                this.showModal = this.showModal.bind(this);
                this.hideModal = this.hideModal.bind(this);
                this.setFt = this.setFt.bind(this);
                this.setInch = this.setInch.bind(this);
        }

        handleFtChange(event) {
                this.props.setFt(parseFloat(event.target.value));
        }

        handleInchChange(event) {
                this.props.setInch(parseFloat(event.target.value));
        }

        showModal() {
                this.setState({ hideModal: false });
        }

        hideModal() {
                this.setState({ hideModal: true });
        }

        setFt(ft) {
                let id = ft + 'ft';
                document.getElementById(id).selected = 'selected';
                this.props.setFt(ft);
        }

        setInch(inch, remainder) {
                let id = inch.toString() + remainder.toString() + '4in';
                let inches = parseInt(inch) + parseFloat((remainder / 4).toFixed(2));
                document.getElementById(id).selected = 'selected';
                this.props.setInch(inches);
        }

        render() {
                return (
                        <div className="input-group my-1">
                                <div
                                        className="input-group-prepend showPointer"
                                        onClick={this.showModal}>
                                        <span
                                                className="input-group-text d-block new_talent_subscription_form">
                                                <i className="fas fa-info-circle text-dark"
                                                        data-toggle="tooltip"
                                                        title="Please click to convert cm to ft!">
                                                </i>
                                                Height:
                                                </span>
                                </div>
                                <select
                                        className="form-control"
                                        name="height_feet"
                                        id="height_feet"
                                        defaultValue=""
                                        onChange={this.handleFtChange}>
                                        <option value="" disabled>Select Feet</option>
                                        <option value="3" id='3ft'>3 feet</option>
                                        <option value="4" id='4ft'>4 feet</option>
                                        <option value="5" id='5ft'>5 feet</option>
                                        <option value="6" id='6ft'>6 feet</option>
                                        <option value="7" id='7ft'>7 feet</option>
                                </select>
                                <select
                                        className="form-control"
                                        name="height_inches"
                                        id="height_inches"
                                        defaultValue=""
                                        onChange={this.handleInchChange}>>
                                        <option value="" disabled>Select Inches</option>
                                        <option value="0" id='004in'>0 inch</option>
                                        <option value="0.25" id='014in'>&nbsp;&nbsp;&nbsp;&nbsp; 1/4 inch</option>
                                        <option value="0.5" id='024in'>&nbsp;&nbsp;&nbsp;&nbsp; 1/2 inch</option>
                                        <option value="0.75" id='034in'>&nbsp;&nbsp;&nbsp;&nbsp; 3/4 inch</option>
                                        <option value="1" id='104in'>1 inch</option>
                                        <option value="1.25" id='114in'>&nbsp;&nbsp;&nbsp;&nbsp; 1 1/4 inch</option>
                                        <option value="1.5" id='124in'>&nbsp;&nbsp;&nbsp;&nbsp; 1 1/2 inch</option>
                                        <option value="1.75" id='134in'>&nbsp;&nbsp;&nbsp;&nbsp; 1 3/4 inch</option>
                                        <option value="2" id='204in'>2 inches</option>
                                        <option value="2.25" id='214in'>&nbsp;&nbsp;&nbsp;&nbsp; 2 1/4 inch</option>
                                        <option value="2.5" id='224in'>&nbsp;&nbsp;&nbsp;&nbsp; 2 1/2 inch</option>
                                        <option value="2.75" id='234in'>&nbsp;&nbsp;&nbsp;&nbsp; 2 3/4 inch</option>
                                        <option value="3" id='304in'>3 inches</option>
                                        <option value="3.25" id='314in'>&nbsp;&nbsp;&nbsp;&nbsp; 3 1/4 inch</option>
                                        <option value="3.5" id='324in'>&nbsp;&nbsp;&nbsp;&nbsp; 3 1/2 inch</option>
                                        <option value="3.75" id='334in'>&nbsp;&nbsp;&nbsp;&nbsp; 3 3/4 inch</option>
                                        <option value="4" id='404in'>4 inches</option>
                                        <option value="4.25" id='414in'>&nbsp;&nbsp;&nbsp;&nbsp; 4 1/4 inch</option>
                                        <option value="4.5" id='424in'>&nbsp;&nbsp;&nbsp;&nbsp; 4 1/2 inch</option>
                                        <option value="4.75" id='434in'>&nbsp;&nbsp;&nbsp;&nbsp; 4 3/4 inch</option>
                                        <option value="5" id='504in'>5 inches</option>
                                        <option value="5.25" id='514in'>&nbsp;&nbsp;&nbsp;&nbsp; 5 1/4 inch</option>
                                        <option value="5.5" id='524in'>&nbsp;&nbsp;&nbsp;&nbsp; 5 1/2 inch</option>
                                        <option value="5.75" id='534in'>&nbsp;&nbsp;&nbsp;&nbsp; 5 3/4 inch</option>
                                        <option value="6" id='604in'>6 inches</option>
                                        <option value="6.25" id='614in'>&nbsp;&nbsp;&nbsp;&nbsp; 6 1/4 inch</option>
                                        <option value="6.5" id='624in'>&nbsp;&nbsp;&nbsp;&nbsp; 6 1/2 inch</option>
                                        <option value="6.75" id='634in'>&nbsp;&nbsp;&nbsp;&nbsp; 6 3/4 inch</option>
                                        <option value="7" id='704in'>7 inches</option>
                                        <option value="7.25" id='714in'>&nbsp;&nbsp;&nbsp;&nbsp; 7 1/4 inch</option>
                                        <option value="7.5" id='724in'>&nbsp;&nbsp;&nbsp;&nbsp; 7 1/2 inch</option>
                                        <option value="7.75" id='734in'>&nbsp;&nbsp;&nbsp;&nbsp; 7 3/4 inch</option>
                                        <option value="8" id='804in'>8 inches</option>
                                        <option value="8.25" id='814in'>&nbsp;&nbsp;&nbsp;&nbsp; 8 1/4 inch</option>
                                        <option value="8.5" id='824in'>&nbsp;&nbsp;&nbsp;&nbsp; 8 1/2 inch</option>
                                        <option value="8.75" id='834in'>&nbsp;&nbsp;&nbsp;&nbsp; 8 3/4 inch</option>
                                        <option value="9" id='904in'>9 inches</option>
                                        <option value="9.25" id='914in'>&nbsp;&nbsp;&nbsp;&nbsp; 9 1/4 inch</option>
                                        <option value="9.5" id='924in'>&nbsp;&nbsp;&nbsp;&nbsp; 9 1/2 inch</option>
                                        <option value="9.75" id='934in'>&nbsp;&nbsp;&nbsp;&nbsp; 9 3/4 inch</option>
                                        <option value="10" id='1004in'>10 inches</option>
                                        <option value="10.25" id='1014in'>&nbsp;&nbsp;&nbsp;&nbsp; 10 1/4 inch</option>
                                        <option value="10.5" id='1024in'>&nbsp;&nbsp;&nbsp;&nbsp; 10 1/2 inch</option>
                                        <option value="10.75" id='1034in'>&nbsp;&nbsp;&nbsp;&nbsp; 10 3/4 inch</option>
                                        <option value="11" id='1104in'>11 inches</option>
                                        <option value="11.25" id='1114in'>&nbsp;&nbsp;&nbsp;&nbsp; 11 1/4 inch</option>
                                        <option value="11.5" id='1124in'>&nbsp;&nbsp;&nbsp;&nbsp; 11 1/2 inch</option>
                                        <option value="11.75" id='1134in'>&nbsp;&nbsp;&nbsp;&nbsp; 11 3/4 inch</option>
                                </select>
                                {(this.state.hideModal) ? '' : (
                                        <HeightModal hideModal={this.hideModal} setFt={this.setFt} setInch={this.setInch} />
                                )}
                        </div>
                );
        }

}

export default HeightSelector;