import React, { Component } from 'react'

class Test extends Component {
        constructor(props) {
                super(props);
                this.state = {
                        value: ''
                }
        }


        render() {
                return (
                        <span className="bg-danger">{(this.props.id) ? this.props.id : "I have nothing to show"}</span>
                );
        }

}

export default Test;