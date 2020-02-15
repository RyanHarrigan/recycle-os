import React from "react";

const dummydata = [
  {
    rfid: "001",
    profilePicture:
      "https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_960_720.png",
    firstName: "John",
    lastName: "Smith",
    points: 20
  },
  {
    rfid: "002",
    profilePicture:
      "https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_960_720.png",
    firstName: "Will",
    lastName: "Smith",
    points: 12
  },
  {
    rfid: "003",
    profilePicture:
      "https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_960_720.png",
    firstName: "Amy",
    lastName: "Smith",
    points: 11
  },
  {
    rfid: "004",
    profilePicture:
      "https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_960_720.png",
    firstName: "Allen",
    lastName: "Smith",
    points: 3
  },
  {
    rfid: "005",
    profilePicture:
      "https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_960_720.png",
    firstName: "Hannah",
    lastName: "Smith",
    points: 1
  }
];
const Leaderboard = props => {
  return (
    <table>
      {dummydata.map(data => (
        <tr>
          <td>
            <img className="leaderboardImage" src={data.profilePicture} />
          </td>
          <td>{data.firstName}</td>
          <td>{data.lastName}</td>
          <td>{data.points}</td>
        </tr>
      ))}
    </table>
  );
};

export default Leaderboard;
