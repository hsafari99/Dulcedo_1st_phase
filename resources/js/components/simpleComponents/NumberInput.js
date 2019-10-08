import React, { Component } from 'react'

class NumberInput extends Component {
        constructor(props) {
                super(props);
                this.state = {
                        classname: (this.props.withToolTip) ? 'input-group-prepend showPointer' : 'input-group-prepend',
                        hasOnClick: (this.props.withToolTip) ? 'cmToInches("waist")' : '',
                }
        }



        render() {
                return (
                        <div
                                className="input-group my-1">
                                <div
                                        className={this.state.classname}
                                        onClick={this.state.hasOnClick}>
                                        <span
                                                className="input-group-text d-block new_talent_subscription_form">
                                                <i
                                                        hidden={!this.props.withToolTip}
                                                        className="fas fa-info-circle text-dark"
                                                        data-toggle="tooltip"
                                                        title="Please click to convert cm to ft!">
                                                </i>
                                                &nbsp;{this.props.title}:
                                                </span>
                                </div>
                                <input
                                        type="number"
                                        name={this.props.title}
                                        className="form-control"
                                        placeholder={this.props.placeholder} />
                        </div>
                );
        }

}

export default NumberInput;