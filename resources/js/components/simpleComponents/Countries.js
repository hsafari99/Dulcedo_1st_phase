
import React, { Component } from 'react';
import $ from 'jquery';

class Countries extends Component {
        constructor(props) {
                super(props);
                this.state = {
                        language: 'english',
                        country1: '',
                        country2: '',
                        country3: '',
                        inactive: false,
                }
        }

        submitCitizenships() {
                this.props.submitCountries(this.state.country1, this.state.country2, this.state.country3);
                this.setState({ inactive: true });
        }

        changeLanguage() {
                if (this.state.language == 'english') {
                        this.setState({ language: 'french' });
                } else {
                        this.setState({ language: 'english' });
                }
        }

        setCountry1(event) {
                this.setState({ country1: event.target.value });
        }

        setCountry2(event) {
                this.setState({ country2: event.target.value });
        }

        setCountry3(event) {
                this.setState({ country3: event.target.value });
        }

        render() {
                return (
                        <fieldset
                                className="border border-dark rounded p-3 my-3 shadow">
                                <legend
                                        className="w-50 pl-2">
                                        <i
                                                className="fas fa-globe-americas text-success awsomeFonts">
                                        </i>
                                        &nbsp; &nbsp;  Citizenships
                                        </legend>
                                <div
                                        className="text-center mx-auto m-2">
                                        <span
                                                className="p-2">
                                                Language:&nbsp;&nbsp;
                                                        <input
                                                        type="radio"
                                                        name="language"
                                                        value="english"
                                                        onChange={this.changeLanguage.bind(this)}
                                                        defaultChecked />
                                                English&nbsp;&nbsp;
                                                        <input
                                                        type="radio"
                                                        name="language"
                                                        value="french"
                                                        onChange={this.changeLanguage.bind(this)} />
                                                French
                                                </span>
                                </div>
                                <div
                                        className="input-group my-1">
                                        <div
                                                className="input-group-prepend">
                                                <span
                                                        className="input-group-text d-block new_talent_subscription_form">
                                                        Citizenships:
                                                        </span>
                                        </div>
                                        <select
                                                name="country1"
                                                disabled={this.state.inactive}
                                                className="form-control countries"
                                                defaultValue=''
                                                onChange={this.setCountry1.bind(this)}>
                                                <option
                                                        disabled
                                                        value=''>
                                                        {(this.state.language == 'english') ? 'Country 1' : 'Pays 1'}
                                                </option>
                                                {(this.props.countriesList) ?
                                                        (
                                                                this.props.countriesList.map((country, index) =>
                                                                        <option
                                                                                key={index}
                                                                                value={country._id}>
                                                                                {(this.state.language == 'english') ? country.en : country.fr}
                                                                        </option>)
                                                        ) :
                                                        (
                                                                ''
                                                        )
                                                }
                                        </select>
                                        <select
                                                name="country2"
                                                disabled={this.state.inactive}
                                                className="form-control countries"
                                                defaultValue=''
                                                onChange={this.setCountry2.bind(this)}>
                                                <option
                                                        disabled value=''>
                                                        {(this.state.language == 'english') ? 'Country 2' : 'Pays 2'}
                                                </option>
                                                {(this.props.countriesList) ? (this.props.countriesList.map((country, index) =>
                                                        <option
                                                                key={index}
                                                                value={country._id} >
                                                                {(this.state.language == 'english') ? country.en : country.fr}
                                                        </option>
                                                )
                                                ) :
                                                        (
                                                                ''
                                                        )
                                                }
                                        </select>
                                        <select
                                                name="country3"
                                                disabled={this.state.inactive}
                                                className="form-control countries"
                                                defaultValue=''
                                                onChange={this.setCountry3.bind(this)}>
                                                <option
                                                        disabled
                                                        value=''>
                                                        {(this.state.language == 'english') ? 'Country 3' : 'Pays 3'}
                                                </option>
                                                {(this.props.countriesList) ? (this.props.countriesList.map((country, index) =>
                                                        <option
                                                                key={index}
                                                                value={country._id}>
                                                                {(this.state.language == 'english') ? country.en : country.fr}
                                                        </option>)
                                                ) :
                                                        (
                                                                ''
                                                        )
                                                }
                                        </select>
                                </div>
                                <span
                                        className="btn btn-success w-100"
                                        onClick={this.submitCitizenships.bind(this)}>
                                        Submit your Citizenships
                                        </span>
                        </fieldset>
                );
        }
}

export default Countries;