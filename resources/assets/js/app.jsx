import React from 'react';
import ReactDOM from 'react-dom';
import update from 'react-addons-update';
import ReactCSSTransitionGroup from 'react-addons-css-transition-group';
import { Button, Table, Glyphicon, Modal, Popover, Tooltip,OverlayTrigger,
Form, FormGroup, ControlLabel, FormControl, Col, InputGroup } from 'react-bootstrap';
import axios from 'axios';
// var Well = ReactBootstrap.Well;
// import { Table } from 'react-bootstrap';
// import { Glyphicon } from 'react-bootstrap';
// import { Modal } from 'react-bootstrap';
// import { Popover } from 'react-bootstrap';
// import { Tooltip } from 'react-bootstrap';
// import { OverlayTrigger } from 'react-bootstrap';

const MemberTable = React.createClass({
		render: function(){
			return(
				<Table condenced>
					<caption>{this.props.captions.top}</caption>
					<thead>
						<tr>
							<th>{this.props.captions.col.seq}</th>
							<th>{this.props.captions.col.name}</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						{this.props.users.map(function(user, index){
							return <tr key={user.id}>
								<td>{index}</td>
								<td>{user.name}</td>
								<td>
									<Button bsStyle="danger" bsSize="xsmall" >
										<Glyphicon glyph="remove" />
									</Button>
								</td>
								</tr>;
						})}
					</tbody>
					<tfoot>
						<tr><td>
						<AddMemberModal captions={this.props.captions}/>
						</td></tr>
					</tfoot>
				</Table>
			)
		}
	});
const AddMemberModal = React.createClass({

	getInitialState() {
		return { add: false, showModal: false, members: candidateMembers,
			validation: {
				name: { state: false, message: "Enter Name" }
			}
		};
	},
	close() { this.setState({ showModal: false }); },
	open() { this.setState({ showModal: true, add: false }); },
	switchBody() { this.setState( {add: true}); },
	handleSubmit(e) {
		e.preventDefault();
		axios.post('/members', {
			name: document.querySelector('#add-member-form input[name=name]').value
		}).then(function(response) {
			console.log(response);
			let members = response.data.members;
			this.setState({add: false, members: members});
		}.bind(this)).catch(function(error){
			console.log(error);
			var message = JSON.parse(error.response.data).message.name[0];
			this.setState({ validation: { name: { state: "error", message: message }}})
		}.bind(this));
	},
 	render() {
 		var modalBody;
		if (!this.state.add) {
			modalBody =
      	<Table condenced>
        	<thead>
        		<tr><th>
						<Form inline>
							<FormGroup controlId="search-member">
								<InputGroup>
								<FormControl type="search" />
								<InputGroup.Button>
									<Button>
										<Glyphicon glyph="search" />
									</Button>
								</InputGroup.Button>
							</InputGroup>
							</FormGroup>
						</Form>
						</th></tr>
        	</thead>
        	<tbody>
        		{this.state.members.map(function(member, index){
        			return(
        				<tr key={member.id}>
        					<td>{member.name}</td>
        				</tr>
        				)
        		})}
        	</tbody>
        	<tfoot>
        		<tr><td>
        		<Button bsStyle="success" onClick={this.switchBody}>
        			{this.props.captions.newMember}
        		</Button>
        		</td></tr>
        	</tfoot>
        </Table>
			} else {
				var opts = {};
				if (this.state.validation.name.state) {
					opts['validationState'] = this.state.validation.name.state;
				}
				modalBody =
					<Form horizontal onSubmit={this.handleSubmit} id='add-member-form'>
						<FormGroup controlId="add-member-name" {...opts}>
							<Col componentClass={ControlLabel} sm={2}>
								Name
							</Col>
							<Col sm={10}>
								<FormControl type="text" name="name" placeholder={this.state.validation.name.message} />
								<FormControl.Feedback />
							</Col>
						</FormGroup>
						<Col smOffset={2} sm={10}>
							<Button bsStyle='primary' type="submit">
								submit
							</Button>
						</Col>
					</Form>
			}
	    return (
	      <div>
	        <Button bsStyle="success" onClick={this.open}>
	          {this.props.captions.addMember}
	        </Button>

	        <Modal show={this.state.showModal} onHide={this.close}>
	          <Modal.Header closeButton>
	            <Modal.Title>{this.props.captions.addMember}</Modal.Title>
	          </Modal.Header>
	          <Modal.Body>
							<ReactCSSTransitionGroup transitionName="example">
	          	{modalBody}
							</ReactCSSTransitionGroup>
	          </Modal.Body>
	          <Modal.Footer>
	            <Button onClick={this.close}>Close</Button>
	          </Modal.Footer>
	        </Modal>
	      </div>
	    );
  }
});
ReactDOM.render(<MemberTable captions={captions} users={users} />, document.getElementById('member-table'));
