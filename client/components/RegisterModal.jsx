import React from 'react'

const RegisterModal = () => {
    return (
        <div className="modal account-modal fade multi-step" id="user-register"
        // data-keyboard="false" data-backdrop="static"
        >
            <div className="modal-dialog modal-dialog-centered">
                <div className="modal-content">
                    <div className="modal-header p-0 border-0">
                        <button type="button" className="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div className="modal-body">
                        <div className="login-header">
                            <h3>Join as a User</h3>
                        </div>
                        {/* Register Form */}
                        <form action="https://html.truelysell.com/template/index.html">
                            <div className="form-group form-focus">
                                <label className="focus-label">Name</label>
                                <input type="text" className="form-control" placeholder="johndoe@exapmle.com" />
                            </div>
                            <div className="form-group form-focus">
                                <label className="focus-label">Mobile Number</label>
                                <input type="text" className="form-control" placeholder="986 452 1236" />
                            </div>
                            <div className="form-group form-focus">
                                <label className="focus-label">Create Password</label>
                                <input type="password" className="form-control" placeholder="********" />
                            </div>
                            <div className="text-right">
                                <a className="forgot-link" href="#">Already have an account?</a>
                            </div>
                            <div className="d-grid">
                                <button className="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
                            </div>
                            <div className="login-or">
                                <span className="or-line" />
                                <span className="span-or">or</span>
                            </div>
                            <div className="row form-row social-login">
                                <div className="col-6 d-grid">
                                    <a href="#" className="btn btn-facebook btn-block"><i className="fab fa-facebook-f ms-0 mx-1" /> Login</a>
                                </div>
                                <div className="col-6 d-grid">
                                    <a href="#" className="btn btn-google btn-block"><i className="fab fa-google ms-0 mx-1" /> Login</a>
                                </div>
                            </div>
                        </form>
                        {/* /Register Form */}
                    </div>
                </div>
            </div>
        </div>

    )
}

export default RegisterModal