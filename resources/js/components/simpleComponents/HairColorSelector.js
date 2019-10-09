import React, { Component } from 'react'

class HairColorSelector extends Component {
        constructor(props) {
                super(props);
                this.state = {
                }
                this.setHairColor = this.setHairColor.bind(this);
        }

        setHairColor(event) {
                this.props.setHairColor(event.target.value);
        }

        render() {
                return (
                        <div className="input-group my-1">
                                <div className="input-group-prepend">
                                        <span
                                                className="input-group-text d-block new_talent_subscription_form">
                                                Hair Color:
                                                </span>
                                </div>
                                <input
                                        type="text"
                                        name="hair_color"
                                        list="hair_colors"
                                        className="form-control"
                                        placeholder="Please search the hair color from the list or add your own..."
                                        onChange={this.setHairColor} />
                                <datalist id="hair_colors">
                                        <option value="Black" />
                                        <option value="Brown" />
                                        <option value="Blond" />
                                        <option value="Red" />
                                        <option value="White " />
                                        <option value="Gray " />
                                </datalist>
                        </div>
                );
        }

}

export default HairColorSelector;