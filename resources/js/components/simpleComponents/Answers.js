
import React, { Component } from 'react';
import $ from 'jquery';
import Question from './Question';

class Answers extends Component {
        constructor(props) {
                super(props);
                this.state = {
                        language: 'english',
                        index: 0,
                        setFocus: false,
                        responses: [],
                }
        }

        changeLanguage() {
                if (this.state.language === 'english') {
                        this.setState({ language: 'french' });
                } else {
                        this.setState({ language: 'english' });
                }

        }

        setQuestionNo(index) {
                this.setState({ index: index });
        }

        goToEnd() {
                this.setState({ setFocus: true });
        }

        passResponses(question_id, response) {
                let newResponses = this.state.responses;
                newResponses.map((response, index) => {
                        if (response.question_id == question_id) {
                                newResponses.splice(index, 1);
                        }
                });
                newResponses.push(
                        {
                                question_id: question_id,
                                answer: response,
                        }
                );

                this.setState({ responses: newResponses });
        }

        passAllResponses() {
                console.log("clicked successfully");
                if (this.state.responses.length == this.props.questions.length && this.props.questions) {
                        this.props.passResponses(this.state.responses);
                }
        }

        render() {
                return (
                        <fieldset
                                className="border border-dark rounded p-3 my-3 shadow">
                                <legend
                                        className="w-50 pl-2">
                                        <i
                                                className="fas fa-question-circle text-dark awsomeFonts">
                                        </i>
                                        Questions & Answers
                                        </legend>
                                <div
                                        className="d-flex flex-row justify-content-between w-100">
                                        <div
                                                className=" my-auto">
                                                <span
                                                        className="bg-warning p-2">
                                                        Total no. of Questions: &nbsp;
                                                        <span
                                                                className="font-weight-bold text-danger pr-2">
                                                                {this.props.questions ? this.props.questions.length : 0}
                                                        </span>
                                                </span>
                                        </div>
                                        <div
                                                className=" my-auto">
                                                <span
                                                        className="bg-info p-2">
                                                        Language:
                                                        <input
                                                                type="radio"
                                                                name="language"
                                                                value="english"
                                                                onChange={this.changeLanguage.bind(this)}
                                                                defaultChecked />
                                                        English
                                                        <input
                                                                type="radio"
                                                                name="language"
                                                                value="french"
                                                                onChange={this.changeLanguage.bind(this)} />
                                                        French
                                                </span>
                                        </div>
                                        <div>
                                                <span
                                                        className="btn btn-dark showPointer"
                                                        onClick={this.goToEnd.bind(this)}>
                                                        <i
                                                                className="fas fa-fast-forward text-light awsomeFonts">
                                                        </i>&nbsp; End</span>
                                        </div>
                                </div>
                                <div
                                        className="input-group my-1"
                                        id="questionsBoard">
                                        {(this.props.questions) ?
                                                this.props.questions.map((question, index) => <Question
                                                        key={index}
                                                        question_id={question._id}
                                                        index={index + 1}
                                                        total={this.props.questions.length}
                                                        message={(this.state.language === 'english') ?
                                                                "Please enter your repsonse here..." :
                                                                "Veuillez entrer votre réponse ici ..."}
                                                        question={(this.state.language === 'english') ?
                                                                question.en :
                                                                question.fr}
                                                        setQuestionNo={this.setQuestionNo.bind(this)}
                                                        requestFocus={this.state.setFocus}
                                                        passResponse={this.passResponses.bind(this)}
                                                        receivedSuccessfully={this.props.receivedSuccessfully}
                                                />) :
                                                ('')
                                        }
                                        <span className="btn btn-dark w-100" onClick={this.passAllResponses.bind(this)}>Save All The responses</span>
                                </div>
                        </fieldset>
                );
        }
}

export default Answers;