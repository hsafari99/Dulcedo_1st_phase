import React, { Component } from 'react'

import OfficeSelctor from './simpleComponents/OfficeSelctor';
import GenderSelector from './simpleComponents/GenderSelector';
import EyeColorSelector from './simpleComponents/EyeColorSelector';
import HairColorSelector from './simpleComponents/HairColorSelector';
import HeightSelector from './simpleComponents/HeightSelector';
import NumberInput from './simpleComponents/NumberInput';

class BodyInfo extends Component {
        constructor(props) {
                super(props);
                this.state = {
                        hideModal: true,
                }
                this.setOffice = this.setOffice.bind(this);
                this.setGender = this.setGender.bind(this);
                this.setEyeColor = this.setEyeColor.bind(this);
                this.setHairColor = this.setHairColor.bind(this);
                this.setFt = this.setFt.bind(this);
                this.setInch = this.setInch.bind(this);
                this.setNumberValue = this.setNumberValue.bind(this);
                this.showModal = this.showModal.bind(this);
        }

        setOffice(office_id) {
                this.props.setOffice(office_id);
        }

        setGender(gender) {
                this.props.setGender(gender);
        }

        setEyeColor(eyeColor) {
                this.props.setEyeColor(eyeColor);
        }

        setHairColor(hairColor) {
                this.props.setHairColor(hairColor)
        }

        setFt(ft) {
                this.props.setFt(ft);
        }

        setInch(inch) {
                this.props.setInch(inch);
        }

        setNumberValue(title, value) {
                this.props.setNumberValue(title, value);
        }

        showModal(title) {

                if (title != 'dress' && title != 'shoe') {
                        this.setState({ hideModal: false });
                }
        }

        render() {
                return (
                        <fieldset
                                className="border border-dark rounded p-3 my-3 shadow"
                                id="bodyInfo">
                                <legend
                                        className="w-50 pl-2">
                                        <i className="fas fa-id-card-alt text-info awsomeFonts"></i>
                                        &nbsp;Physical Information
                                </legend>

                                <OfficeSelctor setOffice={this.setOffice} />
                                <GenderSelector setGender={this.setGender} />
                                <EyeColorSelector setEyeColor={this.setEyeColor} />
                                <HairColorSelector setHairColor={this.setHairColor} />
                                <HeightSelector setFt={this.setFt} setInch={this.setInch} />
                                <NumberInput
                                        title='waist'
                                        placeholder="Please enter the size in inches"
                                        withToolTip={true}
                                        setNumberValue={this.setNumberValue}
                                        showModal={this.showModal} />
                                <NumberInput
                                        title='bust'
                                        placeholder="Please enter the size in inches"
                                        withToolTip={true}
                                        setNumberValue={this.setNumberValue}
                                        showModal={this.showModal} />
                                <NumberInput
                                        title='hips'
                                        placeholder="Please enter the size in inches"
                                        withToolTip={true}
                                        setNumberValue={this.setNumberValue}
                                        showModal={this.showModal} />
                                <NumberInput
                                        title='neck'
                                        placeholder="Please enter the size in inches"
                                        withToolTip={true}
                                        setNumberValue={this.setNumberValue}
                                        showModal={this.showModal} />
                                <NumberInput
                                        title='sleeve'
                                        placeholder="Please enter the size in inches"
                                        withToolTip={true}
                                        setNumberValue={this.setNumberValue}
                                        showModal={this.showModal} />
                                <NumberInput
                                        title='dress'
                                        placeholder="Please enter the Canadian base sizes..."
                                        withToolTip={false} setNumberValue
                                        ={this.setNumberValue}
                                        showModal={this.showModal} />
                                <NumberInput
                                        title='shoe'
                                        placeholder="Please enter the Canadian base sizes..."
                                        withToolTip={false}
                                        setNumberValue={this.setNumberValue}
                                        showModal={this.showModal} />
                                <NumberInput
                                        title='inseam'
                                        placeholder="Please enter the size in inches"
                                        withToolTip={true}
                                        setNumberValue={this.setNumberValue}
                                        showModal={this.showModal} />
                        </fieldset>
                );
        }
}

export default BodyInfo;