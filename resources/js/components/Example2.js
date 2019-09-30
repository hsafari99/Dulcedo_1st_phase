import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component {
    render() {
        return (
            <div>This is a test man!</div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example name="Hossein"/>, document.getElementById('example'));
}
