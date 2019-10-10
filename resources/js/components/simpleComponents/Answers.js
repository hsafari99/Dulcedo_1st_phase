
import React, { Component } from 'react';
import $ from 'jquery';
import Question from './Question';

class Answers extends Component {
        constructor(props) {
                super(props);
                this.state = {
                        language: 'english',
                        index: 0,
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
                                                        onClick={this.goToEnd}>
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
                                                />) :
                                                ('')
                                        }
                                </div>
                        </fieldset>
                );
        }
}

export default Answers;