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
      profile: false,
      dummydataIndex: 0,
      dummydata: [
        {
          rfid: "001",
          profilePicture:
            "https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_960_720.png",
          firstName: "John",
          lastName: "Smith",
          points: 9001
        },
        {
          rfid: "002",
          profilePicture:
            "https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_960_720.png",
          firstName: "Will",
          lastName: "Smith",
          points: 420
        },
        {
          rfid: "003",
          profilePicture:
            "https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_960_720.png",
          firstName: "Amy",
          lastName: "Smith",
          points: 69
        },
        {
          rfid: "004",
          profilePicture:
            "https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_960_720.png",
          firstName: "Allen",
          lastName: "Smith",
          points: 5
        },
        {
          rfid: "005",
          profilePicture:
            "https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_960_720.png",
          firstName: "Hannah",
          lastName: "Smith",
          points: 1
        }
      ]
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
      rfid: e.target.value
    });
  }

  handleSubmit(e) {
    let found = false;
    for (let i = 0; i < this.state.dummydata.length; i++) {
      if (this.state.dummydata[i].rfid === this.state.rfid) {
        found = true;
        this.setState({
          dummydataIndex: i,
          buttonClicked: true
        });
      }
    }
    this.setState({
      buttonClicked: true
    });
  }
  componentDidMount() {}

  render() {
    return (
      <div>
        {this.state.buttonClicked === false ? (
          <div className="container">
            <div className="header clearfix">
              <nav>
                <ul className="nav nav-pills float-right">
                  <li className="nav-item"></li>
                  <li className="nav-item"></li>
                  <li className="nav-item">
                    <a className="nav-link" href="#">
                      About Us
                    </a>
                  </li>
                </ul>
              </nav>
              <h3 className="text-muted">Welcome to Recyclos</h3>
            </div>
            <div className="jumbotron">
              <h1 className="display-3">The Recycling App for Swag</h1>
              <p className="lead">
                Cras justo odio, dapibus ac facilisis in, egestas eget quam.
                Fusce dapibus, tellus ac cursus commodo, tortor mauris
                condimentum nibh, ut fermentum massa justo sit amet risus.
              </p>
              <div className="form-group" style={{}}>
                <a className="btn btn-lg btn-success" href="#" role="button">
                  <label>Enter your rfid</label>
                  <input
                    type="text"
                    className="form-control"
                    onChange={this.handleChange}
                  />
                </a>
              </div>
              <a
                className="btn btn-lg btn-success"
                href="#"
                role="button"
                onClick={this.handleSubmit}
              >
                Submit
              </a>
              <p />
            </div>
            <div className="row marketing">
              <div className="col-lg-6">
                <h4>Subheading</h4>
                <p>
                  Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                  Cras mattis consectetur purus sit amet fermentum.
                </p>
                <h4>Subheading</h4>
                <p>
                  Maecenas sed diam eget risus varius blandit sit amet non
                  magna.
                </p>
              </div>
              <div className="col-lg-6">
                <h4>Subheading</h4>
                <p>
                  Donec id elit non mi porta gravida at eget metus. Maecenas
                  faucibus mollis interdum.
                </p>
                <h4>Subheading</h4>
                <p>
                  Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                  Cras mattis consectetur purus sit amet fermentum.
                </p>
                <h4>Subheading</h4>
                <p>
                  Maecenas sed diam eget risus varius blandit sit amet non
                  magna.
                </p>
              </div>
            </div>
            <footer className="footer">
              <p contentEditable="true" spellcheckker="false">
                © Recyclos 2020
              </p>
            </footer>
          </div>
        ) : this.state.leaderboard ? (
          <Leaderboard dummydata={this.state.dummydata} />
        ) : this.state.profile ? (
          <Profile
            rank={this.state.dummydataIndex}
            data={this.state.dummydata[this.state.dummydataIndex]}
            stats={this.state.dummydata[this.state.dummydataIndex].points}
          />
        ) : (
          <div className="container">
            <div className="header clearfix">
              <nav>
                <ul className="nav nav-pills float-right">
                  <li className="nav-item"></li>
                  <li className="nav-item"></li>
                  <li className="nav-item">
                    <a className="nav-link" href="#">
                      About Us
                    </a>
                  </li>
                </ul>
              </nav>
              <h3 className="text-muted">Welcome to Recyclos</h3>
            </div>
            <div className="jumbotron">
              <h1 className="display-3">The Recycling App for Swag</h1>
              <p className="lead">
                Cras justo odio, dapibus ac facilisis in, egestas eget quam.
                Fusce dapibus, tellus ac cursus commodo, tortor mauris
                condimentum nibh, ut fermentum massa justo sit amet risus.
              </p>
              <div>
                {" "}
                hello{" "}
                {
                  this.state.dummydata[this.state.dummydataIndex].firstName
                }!{" "}
              </div>
              <button
                className="btn btn-lg btn-success"
                onClick={this.goToProfile}
              >
                View Profile
              </button>
              <button
                className="btn btn-lg btn-success"
                onClick={this.goToLeaderboard}
              >
                View Leaderboard
              </button>
              <a
                className="btn btn-lg btn-success"
                href="#"
                role="button"
                onClick={this.handleSubmit}
              >
                Submit
              </a>
              <p />
            </div>
            <div className="row marketing">
              <div className="col-lg-6">
                <h4>Subheading</h4>
                <p>
                  Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                  Cras mattis consectetur purus sit amet fermentum.
                </p>
                <h4>Subheading</h4>
                <p>
                  Maecenas sed diam eget risus varius blandit sit amet non
                  magna.
                </p>
              </div>
              <div className="col-lg-6">
                <h4>Subheading</h4>
                <p>
                  Donec id elit non mi porta gravida at eget metus. Maecenas
                  faucibus mollis interdum.
                </p>
                <h4>Subheading</h4>
                <p>
                  Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                  Cras mattis consectetur purus sit amet fermentum.
                </p>
                <h4>Subheading</h4>
                <p>
                  Maecenas sed diam eget risus varius blandit sit amet non
                  magna.
                </p>
              </div>
            </div>
            <footer className="footer">
              <p contentEditable="true" spellcheckker="false">
                © Recyclos 2020
              </p>
            </footer>
          </div>
        )}
      </div>
    );
  }
}

export default App;
