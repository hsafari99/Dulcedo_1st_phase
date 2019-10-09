import React, { Component } from 'react'

class EyeColorSelector extends Component {
        constructor(props) {
                super(props);
                this.state = {
                }
                this.setEyeColor = this.setEyeColor.bind(this);
        }

        setEyeColor(event) {
                this.props.setEyeColor(event.target.value);
        }

        render() {
                return (
                        <div className="input-group my-1">
                                <div
                                        className="input-group-prepend">
                                        <span
                                                className="input-group-text d-block new_talent_subscription_form">
                                                Eye Color:
                                                </span>
                                </div>
                                <input
                                        type="text"
                                        name="eye_color"
                                        className="form-control"
                                        list="eye_colors"
                                        placeholder="Please select the eye color from the list or add your own..."
                                        onChange={this.setEyeColor} />
                                <datalist id="eye_colors">
                                        <option value="Blue" />>
                                                        <option value="Brown" />
                                        <option value="Black" />
                                        <option value="Green" />
                                        <option value="Hazel " />
                                        <option value="Gray " />
                                        <option value="Amber " />
                                </datalist>
                        </div>
                );
        }

}

export default EyeColorSelector;