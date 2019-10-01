import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Examples extends Component {
    render() {
        return (
            <div>This is a test man!</div>
        );
    }
}

if (document.getElementById('examples')) {
    ReactDOM.render(<Examples/>, document.getElementById('examples'));
}
