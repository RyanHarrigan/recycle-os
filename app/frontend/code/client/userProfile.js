import React from "react";

const Profile = props => {
  return (
    <div className="bg-white shadow rounded overflow-hidden">
      <div className="px-4 pt-0 pb-4 bg-dark">
        <div className="media align-items-end profile-header">
          <div className="profile mr-3">
            <img
              src={props.data.profilePicture}
              alt="..."
              width={130}
              className="rounded mb-2 img-thumbnail"
            />
            <a href="#" className="btn btn-dark btn-sm btn-block">
              Edit profile
            </a>
          </div>
          <div className="media-body mb-5 text-white">
            <h4 className="mt-0 mb-0">
              {props.data.firstName} {props.data.lastName}
            </h4>
            <p className="small mb-4">
              <i className="fa fa-map-marker mr-2" />
              Orlando
            </p>
          </div>
          <div className="fa fa-map-marker mr-2 text-white">
            Your badge({props.data.points} pts):{" "}
            {props.rank === 0 ? (
              <img
                width={200}
                className="rounded mb-2 img-thumbnail"
                src="https://black-rob-place.s3.us-east-2.amazonaws.com/Screen+Shot+2020-02-15+at+2.29.19+PM.png"
              />
            ) : props.stats > 0 && props.stats < 10 ? (
              <img
                width={200}
                className="rounded mb-2 img-thumbnail"
                src="https://black-rob-place.s3.us-east-2.amazonaws.com/Screen+Shot+2020-02-15+at+2.27.47+PM.png"
              />
            ) : props.stats >= 10 && props.stats < 100 ? (
              <img
                width={200}
                className="rounded mb-2 img-thumbnail"
                src="https://black-rob-place.s3.us-east-2.amazonaws.com/Screen+Shot+2020-02-15+at+2.27.58+PM.png"
              />
            ) : (
              <img
                width={200}
                className="rounded mb-2 img-thumbnail"
                src="https://black-rob-place.s3.us-east-2.amazonaws.com/Screen+Shot+2020-02-15+at+2.29.07+PM.png"
              />
            )}
          </div>{" "}
        </div>
      </div>
      <div className="bg-light p-4 d-flex justify-content-end text-center">
        <ul className="list-inline mb-0">
          <li className="list-inline-item">
            <h5 className="font-weight-bold mb-0 d-block">241</h5>
            <small className="text-muted">
              {" "}
              <i className="fa fa-picture-o mr-1" />
              Photos
            </small>
          </li>
          <li className="list-inline-item">
            <h5 className="font-weight-bold mb-0 d-block">84K</h5>
            <small className="text-muted">
              {" "}
              <i className="fa fa-user-circle-o mr-1" />
              Followers
            </small>
          </li>
        </ul>
      </div>
      <div className="py-4 px-4">
        <div className="d-flex align-items-center justify-content-between mb-3">
          <h5 className="mb-0">Recent photos</h5>
          <a href="#" className="btn btn-link text-muted">
            Show all
          </a>
        </div>
        <div className="row">
          <div className="col-lg-6 mb-2 pr-lg-1">
            <img
              src="https://res.cloudinary.com/mhmd/image/upload/v1556294928/nicole-honeywill-546848-unsplash_ymprvp.jpg"
              alt
              className="img-fluid rounded shadow-sm"
            />
          </div>
          <div className="col-lg-6 mb-2 pl-lg-1">
            <img
              src="https://res.cloudinary.com/mhmd/image/upload/v1556294927/dose-juice-1184444-unsplash_bmbutn.jpg"
              alt
              className="img-fluid rounded shadow-sm"
            />
          </div>
          <div className="col-lg-6 pr-lg-1 mb-2">
            <img
              src="https://res.cloudinary.com/mhmd/image/upload/v1556294926/cody-davis-253925-unsplash_hsetv7.jpg"
              alt
              className="img-fluid rounded shadow-sm"
            />
          </div>
          <div className="col-lg-6 pl-lg-1">
            <img
              src="https://res.cloudinary.com/mhmd/image/upload/v1556294928/tim-foster-734470-unsplash_xqde00.jpg"
              alt
              className="img-fluid rounded shadow-sm"
            />
          </div>
        </div>
        <div className="py-4">
          <h5 className="mb-3">Recent posts</h5>
          <div className="p-4 bg-light rounded shadow-sm">
            <p className="font-italic mb-0">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
              enim ad minim veniam.
            </p>
            <ul className="list-inline small text-muted mt-3 mb-0">
              <li className="list-inline-item">
                <i className="fa fa-comment-o mr-2" />
                12 Comments
              </li>
              <li className="list-inline-item">
                <i className="fa fa-heart-o mr-2" />
                200 Likes
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Profile;
