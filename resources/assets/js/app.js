import React from 'react';
import ReactDOM from 'react-dom';
import ReactBootstrap from 'react-bootstrap';
// var Collapse = ReactBootstrap.Collapse;
import { Button } from 'react-bootstrap';
// var Well = ReactBootstrap.Well;
import { Table } from 'react-bootstrap';
import { Glyphicon } from 'react-bootstrap';
import { Modal } from 'react-bootstrap';
import { Popover } from 'react-bootstrap';
import { Tooltip } from 'react-bootstrap';
import { OverlayTrigger } from 'react-bootstrap';

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
									<Button bsStyle="danger" bsSize="xsmall">
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
	
	getInitialState() { return { add: false, showModal: false };},
	close() { this.setState({ showModal: false }); },
	open() { this.setState({ showModal: true }); },
	switchBody() { this.setState( {add: true}); },
 	render() {
 		var modalBody;
		if (!this.state.add) {
			modalBody = 
      	<Table condenced>
        	<thead>
        		<tr><th>{this.props.captions.col.name}</th></tr>
        	</thead>
        	<tbody>
        		{candidateMembers.map(function(member, index){
        			return(
        				<tr key={member.id}>
        					<td>{member.name}</td>
        				</tr>
        				)
        		})}
        	</tbody>
        	<tfoot>
        		<tr><td>
        		<Button bsStyle="success" bsSize="xs" onClick={this.switchBody}>
        			{this.props.captions.newMember}
        		</Button>
        		</td></tr>
        	</tfoot>
        </Table>
			} else {
				modalBody = <div>Add New Member</div>
			}
			modalBody = <Modal.Body>{modalBody}</Modal.Body>
	    return (
	      <div>
	        <Button bsStyle="success" onClick={this.open}>
	          {this.props.captions.addMember}
	        </Button>

	        <Modal show={this.state.showModal} onHide={this.close}>
	          <Modal.Header closeButton>
	            <Modal.Title>{this.props.captions.addMember}</Modal.Title>
	          </Modal.Header>
	          {modalBody}
	          <Modal.Footer>
	            <Button onClick={this.close}>Close</Button>
	          </Modal.Footer>
	        </Modal>
	      </div>
	    );
  }
});
ReactDOM.render(<MemberTable captions={captions} users={users} />, document.getElementById('member-table'));