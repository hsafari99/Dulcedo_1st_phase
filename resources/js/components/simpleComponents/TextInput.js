import React, {Component} from 'react';

class TextInput extends Component{
        constructor(props){
                super(props);
                this.state={
                        checked: false
                };
        }



        render(){
                return (
                        <div className="input-group pt-2">
                                <div className="input-group-prepend">
                                        <span className="input-group-text d-block new_talent_subscription_form">First Name:</span>
                                </div>
                                <input type="text" className="form-control" name="firstName" />
                        </div>
                );
        }
}

export default TextInput;