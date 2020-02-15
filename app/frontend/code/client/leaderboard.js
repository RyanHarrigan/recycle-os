import React from "react";

const Leaderboard = props => {
  return (
    <table>
      <thead>
        <tr>
          <th>Profile Picture</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Points</th>
        </tr>
      </thead>
      <tbody>
        {props.dummydata.map(data => (
          <tr>
            <td>
              <img
                width={80}
                className="rounded mb-2 img-thumbnail"
                src={data.profilePicture}
              />
            </td>
            <td>{data.firstName}</td>
            <td>{data.lastName}</td>
            <td>{data.points}</td>
          </tr>
        ))}
      </tbody>
    </table>
  );
};

export default Leaderboard;
