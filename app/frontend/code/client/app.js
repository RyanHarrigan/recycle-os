import React from "react";
import Leaderboard from "./leaderboard.js";
import Profile from "./userProfile.js";

class App extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      rfid: "",
      buttonClicked: false,
      leaderboard: false,
      profile: false
    };
    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
    this.goToLeaderboard = this.goToLeaderboard.bind(this);
    this.goToProfile = this.goToProfile.bind(this);
  }

  goToLeaderboard() {
    this.setState({
      leaderboard: true
    });
  }

  goToProfile() {
    this.setState({
      profile: true
    });
  }

  handleChange(e) {
    this.setState({
      userID: e.target.value
    });
  }

  handleSubmit(e) {
    this.setState({
      buttonClicked: true
    });
  }
  componentDidMount() {}

  render() {
    return (
      <div>
        {this.state.buttonClicked === false ? (
          <div>
            <h1>Welcome to Recyclo's!</h1>
            <h3>The Recycling app for swag</h3>
            <span>
              enter your rfid
              <input type="text" onChange={this.handleChange} />
              <button onClick={this.handleSubmit}>Submit</button>
            </span>
          </div>
        ) : this.state.leaderboard ? (
          <Leaderboard userID={this.state.rfid} />
        ) : this.state.profile ? (
          <Profile userID={this.state.userID} />
        ) : (
          <div>
            <h1>Welcome to Recyclo's!</h1>
            <h3>The Recycling app for swag</h3>
            <div>hello {this.state.userID}! </div>
            <button onClick={this.goToProfile}>View Profile</button>
            <button onClick={this.goToLeaderboard}>View Leaderboard</button>
          </div>
        )}
      </div>
    );
  }
}

export default App;
