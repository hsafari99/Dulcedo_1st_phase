
import React, { Component } from 'react';
import $ from 'jquery';

class Question extends Component {
        constructor(props) {
                super(props);
                this.state = {
                }
        }

        setQuestionNo() {
                this.props.setQuestionNo(this.props.index);
        }

        render() {

                return (
                        <div
                                className="py-2 w-100">
                                <span
                                        className="font-weight-bold font-italic badge badge-dark">
                                        Question {this.props.index} of {this.props.total}:
                                        </span>
                                <label>
                                        &nbsp; &nbsp; &nbsp;{this.props.question}
                                </label>
                                <textarea
                                        name={this.props.question_id}
                                        className="w-100 px-2"
                                        rows="5"
                                        placeholder={this.props.message}
                                        onFocus={this.setQuestionNo.bind(this)}>
                                </textarea>
                        </div>
                );
        }
}

export default Question;