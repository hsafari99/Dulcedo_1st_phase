import React, {Component} from 'react';

class SearchContact extends Component{
        constructor(props){
                super(props);
                this.state = {
                        firstName: '',
                        lastName:  '',
                        email:     ''
                };
        this.handleChange = this.handleChange.bind(this);
        this.showContacts = this.showContacts.bind(this);
        }

        handleChange(event) {
                this.setState({
                        [event.target.name]: event.target.value
                });
        }

        showContacts(event) {
  //e.preventDefault();
//   var firstName = $('input[name="firstName"]').val();
//   var lastName = $('input[name="lastName"]').val();
//   var email = $('input[name="email"]').val();
//   $.ajax({
//     headers: {
//       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     },
//     url: "/test",
//     method: 'POST',
//     data:{
//       fname: firstName,
//       lname: lastName,
//       email: email
//     },
//     success: function(result){
//         var test = JSON.parse(result);

//         $('#listContent').children().remove();
//         if (test.length == 0) {
//           $('#listContent').append("<span class='text-danger font-weight-bold'>No Contact Found with Given Criteria...</span>");
//         }else{
//           $.each(test, function (index, value) { 
//             var t = value._id;
//             $('#listContent').append("<button onClick='test(this)' class='border rounded bg-info my-2 p-2 results w-100' style='cursor:pointer;' "+
//                                       "id='"+value._id+"'>Full Name: "+
//                                       "<span class='font-weight-bold'>"+value.firstname+" "+value.lastname+"</span>"+
//                                       "<br/>Email: <span class='font-weight-bold'>"+value.email+
//                                       "</span></button>");
//           });            
//         }
//         $('#contactResult').show();
//     }        
//   });
    
        }

        render(){
                return (
                        <div 
                        id="searchContact" 
                        hidden = {this.props.isHidden}>
                                <fieldset 
                                className="border border-dark rounded p-3 my-3 shadow">
                                <legend 
                                className="w-50 pl-2 pl-5">
                                        Search Contact
                                </legend>
                                <div className="input-group pt-2">
                                        <div className="input-group-prepend">
                                                <span className="input-group-text d-block new_talent_subscription_form">First Name:</span>
                                        </div>
                                        <input type="text" className="form-control" name="firstName" onChange={this.handleChange} value={this.state.firstName}/>
                                </div>
                                <div className="input-group pt-2">
                                        <div className="input-group-prepend">
                                                <span className="input-group-text d-block new_talent_subscription_form">Last Name:</span>
                                        </div>
                                        <input type="text" className="form-control" name="lastName" onChange={this.handleChange} value={this.state.lastName}/>
                                </div>
                                <div className="input-group pt-2">
                                        <div className="input-group-prepend">
                                                <span className="input-group-text d-block new_talent_subscription_form">Email:</span>
                                        </div>
                                        <input type="email" className="form-control" name="email" onChange={this.handleChange} value={this.state.email}/>
                                </div>
                                <div className="input-group pt-2">
                                        <span className="btn btn-info w-100" onClick={this.showContacts}>Search</span>
                                </div>
                                </fieldset>
                        </div>
                );
        }
}

export default SearchContact;