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
            applicant: '',
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
            guardian: '',
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
        };

        this.changeStatus = this.changeStatus.bind(this);
        this.disableOther = this.disableOther.bind(this);
        this.handleChange = this.handleChange.bind(this);
        this.getInfo = this.getInfo.bind(this);
        this.retrieveid = this.retrieveid.bind(this);
        this.resetModal = this.resetModal.bind(this);
        this.setScoutOffice = this.setScoutOffice.bind(this);
        this.setScoutId = this.setScoutId.bind(this);
        this.setSourceNote = this.setSourceNote.bind(this);
        this.setSource = this.setSource.bind(this);
        this.setEvent = this.setEvent.bind(this);
        this.resetEvent = this.resetEvent.bind(this);
        this.setOffice = this.setOffice.bind(this);
        this.setGender = this.setGender.bind(this);
        this.setEyeColor = this.setEyeColor.bind(this);
        this.setHairColor = this.setHairColor.bind(this);
        this.setFt = this.setFt.bind(this);
        this.setInch = this.setInch.bind(this);
        this.setNumberValue = this.setNumberValue.bind(this);
        this.recordSocialMedias = this.recordSocialMedias.bind(this);
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

    render() {
        return (<div>
            <ContactChecker key="applicant"
                changeStatus={this.changeStatus}
                formDisplay={this.state.applicantChecked}
                formEnabled={this.state.applicantEnabled}
                isWho="applicant" />
            <ContactChecker key="guardian"
                changeStatus={this.changeStatus}
                formDisplay={this.state.guardianChecked}
                formEnabled={this.state.guardianEnabled}
                isWho="guardian" />
            {this.state.hideContactSearch ? ("") : (<SearchContact setInputs={this.getInfo} />)}
            {this.state.hideModal ? ("") : (<ContactModal result={this.state.value} getid={this.retrieveid} hideModal={this.resetModal} showWhat='contact' />)}

            <form
                action="/registerApplication"
                encType="multipart/form-data"
                method="POST">
                <Contact
                    ontact={this.state.applicant}
                    isWho='applicant' />
                <Contact
                    contact={this.state.guardian}
                    isWho='guardian' />
                <Scout
                    isScouted={this.state.applicantIsScouted}
                    getOffice={this.setScoutOffice}
                    getScout={this.setScoutId} />
                <Source
                    setSourceNote={this.setSourceNote}
                    setSource={this.setSource} />
                <Event
                    setEventId={this.setEvent}
                    hideAlert={this.hideAlert}
                    id={this.state.event_id}
                    resetEvent={this.resetEvent} />
                <BodyInfo
                    setOffice={this.setOffice}
                    setGender={this.setGender}
                    setEyeColor={this.setEyeColor}
                    setHairColor={this.setHairColor}
                    setFt={this.setFt}
                    setInch={this.setInch}
                    setNumberValue={this.setNumberValue} />
                <SocialMedias
                    recordSocialMedias={this.recordSocialMedias} />
                <Answers
                    questions={this.state.questions} />
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