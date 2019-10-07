import React, { Component } from "react";
import ReactDOM from "react-dom";
import ContactChecker from "./ContactChecker";
import ContactModal from "./ContactModal";
import SearchContact from "./searchContact";
import $ from "jquery";
import Contact from './simpleComponents/Contact';
import Scout from './simpleComponents/ScoutPage';
import Source from './simpleComponents/Source';

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
            {this.state.hideContactSearch ? (
                "") : (
                    <SearchContact setInputs={this.getInfo} />
                )
            } {this.state.hideModal ? (
                "") : (
                    <ContactModal result={this.state.value} getid={this.retrieveid} hideModal={this.resetModal} />
                )
            }
            <form action="/registerApplication" encType="multipart/form-data" method="POST">
                <Contact contact={this.state.applicant} isWho='applicant' />
                <Contact contact={this.state.guardian} isWho='guardian' />
                <Scout isScouted={this.state.applicantIsScouted} getOffice={this.setScoutOffice} getScout={this.setScoutId} />
                <Source setSourceNote={this.setSourceNote} setSource={this.setSource} />
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