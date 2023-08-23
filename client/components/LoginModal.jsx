import React from 'react'

const LoginModal = () => {
    return (
        <div className="modal account-modal fade" id="login_modal">
            <div className="modal-dialog modal-dialog-centered">
                <div className="modal-content">
                    <div className="modal-header p-0 border-0">
                        <button type="button" className="close" data-bs-dismiss="modal" aria-label="Close">	<span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div className="modal-body">
                        <div className="login-header">
                            <h3>Login <span>Truelysell</span></h3>
                        </div>
                        <form action="https://html.truelysell.com/template/index.html">
                            <div className="form-group form-focus">
                                <label className="focus-label">Email</label>
                                <input type="email" className="form-control" placeholder="truelysell@example.com" />
                            </div>
                            <div className="form-group form-focus">
                                <label className="focus-label">Password</label>
                                <input type="password" className="form-control" placeholder="********" />
                            </div>
                            <div className="text-right">
                            </div>
                            <div className="d-grid">
                                <button className="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
                            </div>
                            <div className="login-or">	<span className="or-line" />
                                <span className="span-or">or</span>
                            </div>
                            <div className="row form-row social-login">
                                <div className="col-6 d-grid"><a href="#" className="btn btn-facebook btn-block"><i className="fab fa-facebook-f ms-0 mx-1" /> Login</a>
                                </div>
                                <div className="col-6 d-grid"><a href="#" className="btn btn-google btn-block"><i className="fab fa-google ms-0 mx-1" /> Login</a>
                                </div>
                            </div>
                            <div className="text-center dont-have">Don’t have an account? 
                            {/* <a href="#">Register</a> */}
                            <a style={{cursor:'pointer'}} data-bs-toggle="modal" data-bs-target="#user-register">Register</a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default LoginModal