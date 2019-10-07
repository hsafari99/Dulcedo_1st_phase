import React, { Component } from "react";
import ReactDOM from "react-dom";
import ContactChecker from "./ContactChecker";
import ContactModal from "./ContactModal";
import SearchContact from "./searchContact";
import $ from "jquery";
import Contact from './simpleComponents/Contact';

export default class ApplicationRegister extends Component {
    constructor(props) {
        super(props);
        this.state = {
            applicantChecked: false,
            guardianChecked: false,
            hideContactSearch: true,
            hideModal: true,
            value: [],
            applicant: '',
            applicant_fname: '',

            guardian: [],
        };

        this.changeStatus = this.changeStatus.bind(this);
        this.disableOther = this.disableOther.bind(this);
        this.handleChange = this.handleChange.bind(this);
        this.getInfo = this.getInfo.bind(this);
        this.retrieveid = this.retrieveid.bind(this);
        this.resetModal = this.resetModal.bind(this);
    }

    resetModal() {
        this.setState({ hideModal: true });
    }

    retrieveid(ID) {
        this.setState({ applicant: ID });
        console.log("From App reg: " + ID);
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
            {(this.state.applicant) ?
                (
                    <Contact applicant={this.state.applicant} />
                ) : (
                    <Contact applicant='NA' />
                )}

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

//     <ContactModal firstName={this.state.firstName} lastName={this.state.lastName} email={this.state.email} hiding={this.state.showModal} />