import React, { Component } from 'react'

class ModalResult extends Component {
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
                        <button className="bg-info my-1 p-1 showPointer w-100 align-left" name={this.props.id} onClick={this.handleClick}>
                                <span
                                        className="font-weight-bold text-dark">
                                        Full Name:&nbsp;
                                </span>
                                {this.props.firstname}&nbsp;{this.props.lastname}<br />
                                <span
                                        className="font-weight-bold text-dark">
                                        Email:&nbsp;
                                </span>
                                {this.props.email}
                        </button>
                );
        }

}

export default ModalResult;