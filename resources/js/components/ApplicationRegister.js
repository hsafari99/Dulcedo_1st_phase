import React, { Component } from "react";
import ReactDOM from "react-dom";
import $ from "jquery";

import BodyInfo from "./BodyInfo";
import ContactChecker from "./ContactChecker";
import ContactModal from "./ContactModal";
import SearchContact from "./searchContact";

import Contact from './simpleComponents/Contact';
import Event from './simpleComponents/Event';
import Scout from './simpleComponents/ScoutPage';
import Source from './simpleComponents/Source';
import SocialMedias from './simpleComponents/SocialMedias';
import Answers from './simpleComponents/Answers';
import Countries from './simpleComponents/Countries';
import Remark from './simpleComponents/Remark';

export default class ApplicationRegister extends Component {
    constructor(props) {
        super(props);
        this.state = {
            applicantChecked: false,
            guardianChecked: false,
            applicantIsScouted: false,
            hideContactSearch: true,
            hideModal: true,
            office_id: '',
            scout_id: '',
            source_id: '',
            source_note: '',
            event_id: '',
            measureOffice: '',
            gender: '',
            eyeColor: '',
            hairColor: '',
            waist: 0,
            bust: 0,
            hips: 0,
            neck: 0,
            sleeve: 0,
            dress: 0,
            shoe: 0,
            inseam: 0,
            ft: 0,
            inch: 0,
            networks: [],
            value: [],
            applicant: {
                applicant_id: '',
                applicant_fname: '',
                applicant_lname: '',
                applicant_email: '',
                applicant_phone: '',
                applicant_address: '',
                applicant_city: '',
                applicant_postal: '',
                applicant_country: '',
                applicant_dob: '',
                applicant_guardianId: '',
                applicant_guardianRelation: '',
            },
            guardian: {
                guardian_id: '',
                guardian_fname: '',
                guardian_lname: '',
                guardian_email: '',
                guardian_phone: '',
                guardian_address: '',
                guardian_city: '',
                guardian_postal: '',
                guardian_country: '',
                guardian_dob: '',
                guardian_guardianId: '',
                guardian_guardianRelation: '',
            },

            responses: [],
            reponsesReceived: false,
            countries: [],
            submittedCountries: [],
            notes: '',
            sourceList: [],
        };

        // this.changeStatus = this.changeStatus.bind(this);
        // this.disableOther = this.disableOther.bind(this);
        // this.handleChange = this.handleChange.bind(this);
        // this.getInfo = this.getInfo.bind(this);
        // this.retrieveid = this.retrieveid.bind(this);
        // this.resetModal = this.resetModal.bind(this);
        // this.setScoutOffice = this.setScoutOffice.bind(this);
        // this.setScoutId = this.setScoutId.bind(this);
        // this.setSourceNote = this.setSourceNote.bind(this);
        // this.setSource = this.setSource.bind(this);
        // this.setEvent = this.setEvent.bind(this);
        // this.resetEvent = this.resetEvent.bind(this);
        // this.setOffice = this.setOffice.bind(this);
        // this.setGender = this.setGender.bind(this);
        // this.setEyeColor = this.setEyeColor.bind(this);
        // this.setHairColor = this.setHairColor.bind(this);
        // this.setFt = this.setFt.bind(this);
        // this.setInch = this.setInch.bind(this);
        // this.setNumberValue = this.setNumberValue.bind(this);
        // this.recordSocialMedias = this.recordSocialMedias.bind(this);
    }

    componentDidMount() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/getQuestions",
            method: 'POST',
            success: function (result) {
                var test = JSON.parse(result);
                this.setState({ questions: test });
            }.bind(this)
        });

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/getCountries",
            method: 'POST',
            success: function (result) {
                var tests = JSON.parse(result);
                this.setState({ countries: tests });
            }.bind(this)
        });

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/getSources",
            method: 'POST',
            success: function (result) {
                var sourceList = JSON.parse(result);
                this.setState({ sourceList: sourceList });
            }.bind(this)
        });

        // $.ajax({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
        //     url: "/test",
        //     method: 'POST',
        //     success: function (result) {
        //         var test = JSON.parse(result);
        //         console.log.bind("Errors: " + test);
        //     }.bind(this)
        // });
    }

    resetModal() {
        this.setState({ hideModal: true });
    }

    retrieveid(ID) {
        if (this.state.applicantChecked) {
            this.setState({ applicant: ID });

        } else if (this.state.guardianChecked) {
            this.setState({ guardian: ID });
        }
    }

    getInfo(fname, lname, email) {
        let list;
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            url: "/test",
            method: "POST",
            data: {
                fname: fname,
                lname: lname,
                email: email
            },
            success: function (result) {
                list = JSON.parse(result);
                this.setState({
                    value: list,
                    hideModal: false
                });
            }.bind(this)
        });
    }

    handleChange(event) {
        this.setState({
            [event.target.name]: event.target.value
        });
    }

    changeStatus(event) {
        let component = event.target.id;
        if (component == "applicant") {
            this.setState((state, props) => ({
                applicantChecked: !state.applicantChecked
            }));
            this.disableOther(component);
        }
        if (component == "guardian") {
            this.setState((state, props) => ({
                guardianChecked: !state.guardianChecked
            }));
            this.disableOther(component);
        }
        this.setState((state, props) => ({
            hideContactSearch: !state.hideContactSearch
        }));
        this.setState({
            showModal: false
        });
    }

    disableOther(component) {
        if (component == "applicant") {
            if (!this.state.applicantChecked) {
                this.setState({ guardianEnabled: true });
            } else {
                this.setState({ guardianEnabled: false });
            }
        }
        if (component == "guardian") {
            if (!this.state.guardianChecked) {
                this.setState({ applicantEnabled: true });
            } else {
                this.setState({ applicantEnabled: false });
            }
        }
    }

    setScoutOffice(office) {
        this.setState({ office_id: office });
    }

    setScoutId(scoutId) {
        this.setState({ scout_id: scoutId });
    }

    setSourceNote(note) {
        this.setState({ source_note: note });
    }

    setSource(source) {
        this.setState({ source_id: source });
    }

    setEvent(id) {
        this.setState({ event_id: id });
    }

    resetEvent() {
        this.setState({ event_id: '' });
    }

    setOffice(office_id) {
        this.setState({ measureOffice: office_id });
    }

    setGender(gender) {
        this.setState({ gender: gender });
    }

    setEyeColor(eyeColor) {
        this.setState({ eyeColor: eyeColor })
    }

    setHairColor(hairColor) {
        this.setState({ hairColor: hairColor });
    }

    setFt(ft) {
        this.setState({ ft: ft });
    }

    setInch(inch) {
        this.setState({ inch: inch });
    }

    setNumberValue(title, value) {
        this.setState({ [title]: value });
    }

    recordSocialMedias(networks) {
        this.setState({ networks: networks });
    }

    passResponses(responses) {
        this.setState({
            responses: responses,
            reponsesReceived: true,
        });
    }

    submitCountries(country1, country2, country3) {
        this.setState({
            submittedCountries: {
                country1: country1 ? country1 : null,
                country2: country2 ? country2 : null,
                country3: country3 ? country3 : null,
            }
        });
    }

    setNotes(notes) {
        this.setState({ notes: notes });
    }

    submitApplication(e) {
        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/registerApplication",
            method: 'POST',
            success: function (data) {
                console.log("From Success: " + data.errors);
            },
            error: function (data) {
                if (data.status === 422) {
                    let results = JSON.parse(data.responseText);
                    console.log("Errors: " + JSON.stringify(results.errors));
                }
            }
        });
    }

    render() {
        return (<div>
            <ContactChecker key="applicant"
                changeStatus={this.changeStatus.bind(this)}
                formDisplay={this.state.applicantChecked}
                formEnabled={this.state.applicantEnabled}
                isWho="applicant" />
            <ContactChecker key="guardian"
                changeStatus={this.changeStatus.bind(this)}
                formDisplay={this.state.guardianChecked}
                formEnabled={this.state.guardianEnabled}
                isWho="guardian" />
            {this.state.hideContactSearch ?
                ("") :
                (<SearchContact
                    setInputs={this.getInfo.bind(this)}
                />)}
            {this.state.hideModal ?
                ("") :
                (<ContactModal
                    result={this.state.value}
                    getid={this.retrieveid.bind(this)}
                    hideModal={this.resetModal.bind(this)}
                    showWhat='contact' />)}

            <form
                onSubmit={this.submitApplication.bind(this)}
                action="/registerApplication"
                encType="multipart/form-data"
                method="POST">
                <input type="hidden" name="_token" value={$('meta[name="csrf-token"]').attr('content')} />
                <Contact
                    ontact={this.state.applicant}
                    isWho='applicant'
                    countriesList={this.state.countries} />
                <Contact
                    contact={this.state.guardian}
                    isWho='guardian'
                    countriesList={this.state.countries} />
                <Scout
                    isScouted={this.state.applicantIsScouted}
                    getOffice={this.setScoutOffice.bind(this)}
                    getScout={this.setScoutId.bind(this)} />
                <Source
                    sourceList={this.state.sourceList}
                    setSourceNote={this.setSourceNote.bind(this)}
                    setSource={this.setSource.bind(this)} />
                <Event
                    setEventId={this.setEvent.bind(this)}
                    id={this.state.event_id}
                    resetEvent={this.resetEvent.bind(this)} />
                <BodyInfo
                    setOffice={this.setOffice.bind(this)}
                    setGender={this.setGender.bind(this)}
                    setEyeColor={this.setEyeColor.bind(this)}
                    setHairColor={this.setHairColor.bind(this)}
                    setFt={this.setFt.bind(this)}
                    setInch={this.setInch.bind(this)}
                    setNumberValue={this.setNumberValue.bind(this)} />
                <SocialMedias
                    recordSocialMedias={this.recordSocialMedias.bind(this)} />
                <Answers
                    questions={this.state.questions}
                    passResponses={this.passResponses.bind(this)}
                    receivedSuccessfully={this.state.reponsesReceived}
                />
                <Countries
                    countriesList={this.state.countries}
                    submitCountries={this.submitCountries.bind(this)}
                />
                <Remark setNotes={this.setNotes.bind(this)} />
                <div
                    className="input-group my-1">
                    <input
                        type="submit"
                        value="APPLICATION SUBMIT"
                        className="btn btn-success w-100"
                    />
                </div>
            </form>
        </div>
        );
    }
}

if (document.getElementById("AppRegister")) {
    ReactDOM.render(<
        ApplicationRegister />,
        document.getElementById("AppRegister")
    );
}