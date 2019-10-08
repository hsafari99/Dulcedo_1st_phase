import React, { Component } from 'react'

class EventModalResult extends Component {
        constructor(props) {
                super(props);
                this.handleClick = this.handleClick.bind(this);

        }

        handleClick(event) {
                this.props.receiveid(event.target.name);
                this.props.close();
                // console.log(event.target.name);
        }

        render() {
                return (
                        <button className="bg-info my-1 p-1 showPointer w-100 align-left eventClicked" name={this.props.id} onClick={this.handleClick}>
                                <span
                                        className="font-weight-bold text-dark">
                                        Event Name:&nbsp;
                                </span>
                                {this.props.name}<br />
                                <span
                                        className="font-weight-bold text-dark">
                                        Decription:&nbsp;
                                </span>
                                {this.props.desc}
                        </button>
                );
        }

}

export default EventModalResult;