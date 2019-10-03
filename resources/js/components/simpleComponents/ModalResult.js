import React, { Component } from 'react'

class ModalResult extends Component {
        constructor(props) {
                super(props);
                this.getid = this.getid.bind(this);

        }

        getid(event) {
                //this.props.getid(event.target.name);
                console.log(event.target.name);
        }

        render() {
                return (
                        <div className="bg-info m-1 p-1 showPointer" name={this.props.id} onClick={this.getid}>
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
                        </div>
                );
        }

}

export default ModalResult;