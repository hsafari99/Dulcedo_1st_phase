
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

        componentDidUpdate() {
                if (this.props.requestFocus) {
                        if (this.props.index == this.props.total) {
                                document.getElementById(this.props.question_id).focus();
                        }
                }
        }

        passResponse() {
                this.props.passResponse(this.props.question_id, document.getElementById(this.props.question_id).value);
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
                                        id={this.props.question_id}
                                        name={this.props.question_id}
                                        className={(this.props.receivedSuccessfully) ? ("w-100 px-2 bg-light") : ("w-100 px-2")}
                                        rows="5"
                                        placeholder={this.props.message}
                                        onFocus={this.setQuestionNo.bind(this)}
                                        onChange={this.passResponse.bind(this)}
                                        disabled={(this.props.receivedSuccessfully) ? true : false}
                                >
                                </textarea>
                        </div>
                );
        }
}

export default Question;