import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Test extends Component {
    render() {
        return (
                <div>

                </div>
        );
    }
}

if (document.getElementById('test')) {
    ReactDOM.render(<Test/>, document.getElementById('test'));
}