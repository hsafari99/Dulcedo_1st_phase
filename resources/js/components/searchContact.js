import React, {Component} from 'react'
import Input from './simpleComponents/Input';

class SearchContact extends Component{
        constructor(props){
                super(props);
                this.setValue = this.setValue.bind(this);
                this.passToParent = this.passToParent.bind(this);
                this.state={
                        firstName : '',
                        lastName  : '',
                        email     : '',
                }
        }

        setValue(event, value){
                this.setState({[event]: value });
        }

        passToParent(){
                this.props.setInputs(this.state.firstName,
                                     this.state.lastName,
                                     this.state.email
                                );
        }

        
        render() {
                return (
                        <div id="searchContact">
                                <fieldset className="border border-dark rounded p-3 my-3 shadow">
                                        <legend className="w-50 pl-2 pl-5">Search Contact</legend>
                                        <Input title="firstName" setValue={this.setValue}/>
                                        <Input title="lastName" setValue={this.setValue}/>
                                        <Input title="email" setValue={this.setValue}/>
                                        <div className="input-group pt-2">
                                                <span className="btn btn-info w-100" onClick={this.passToParent}>Search</span>
                                        </div>
                                </fieldset>               
                        </div>
                );
        }

}

export default SearchContact;
