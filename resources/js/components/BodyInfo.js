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
                }
                this.setOffice = this.setOffice.bind(this);
        }

        setOffice(office_id) {
                this.props.setOffice(office_id);
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
                                <GenderSelector />
                                <EyeColorSelector />
                                <HairColorSelector />
                                <HeightSelector />
                                <NumberInput title='waist' placeholder="Please enter the size in inches" withToolTip={true} />
                                <NumberInput title='bust' placeholder="Please enter the size in inches" withToolTip={true} />
                                <NumberInput title='hips' placeholder="Please enter the size in inches" withToolTip={true} />
                                <NumberInput title='neck' placeholder="Please enter the size in inches" withToolTip={true} />
                                <NumberInput title='sleeve' placeholder="Please enter the size in inches" withToolTip={true} />
                                <NumberInput title='dress' placeholder="Please enter the Canadian base sizes..." withToolTip={false} />
                                <NumberInput title='shoe' placeholder="Please enter the Canadian base sizes..." withToolTip={false} />
                                <NumberInput title='inseam' placeholder="Please enter the size in inches" withToolTip={true} />
                        </fieldset>
                );
        }
}

export default BodyInfo;