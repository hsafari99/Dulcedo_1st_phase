import React, { Component } from 'react'

class Input extends Component {
        constructor(props) {
                super(props);
                this.state = {
                        value: this.props.id ? this.props.id : '',
                }
                this.handleChange = this.handleChange.bind(this);
                // console.log("FROM INPUT placeholder: " + this.props.placeholder);
                // console.log("FROM INPUT id: " + this.props.id);
        }

        handleChange(event) {
                this.setState({ value: event.target.value });
                this.props.setValue(this.props.title, event.target.value);
        }

        render() {
                return (
                        <div className="input-group pt-2">
                                <div className="input-group-prepend">
                                        <span className="input-group-text d-block new_talent_subscription_form">{this.props.title}:</span>
                                </div>
                                <input
                                        type="text"
                                        className="form-control"
                                        id={this.props.title}
                                        name={this.props.title}
                                        onChange={this.handleChange}
                                        placeholder={(this.props.placeholder) ? this.props.placeholder : ''}
                                />
                        </div>
                );
        }

}

export default Input;