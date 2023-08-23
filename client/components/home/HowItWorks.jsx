import React from 'react'

const HowItWorks = () => {


    return (
        <section className="how-work">
            <div className="container">
                <div className="row">
                    <div className="col-lg-12">
                        <div className="heading howitworks aos" data-aos="fade-up" >
                            <h2>How It Works</h2>
                            <span>Aliquam lorem ante, dapibus in, viverra quis</span>
                        </div>
                        <div className="howworksec">
                            <div className="row">
                                <div className="col-lg-4">
                                    <div className="howwork aos" data-aos="fade-up" >
                                        <div className="iconround">
                                            <div className="steps">01</div>
                                            <img src="/assets/img/icon-1.png" alt="true" />
                                        </div>
                                        <h3>Choose What To Do</h3>
                                        <p>Aliquam lorem ante, dapibus in, viverra quis, feugiat Phasellus viverra nulla ut metus varius laoreet.</p>
                                    </div>
                                </div>
                                <div className="col-lg-4">
                                    <div className="howwork aos" data-aos="fade-up" >
                                        <div className="iconround">
                                            <div className="steps">02</div>
                                            <img src="/assets/img/icon-2.png" alt="true" />
                                        </div>
                                        <h3>Find What You Want</h3>
                                        <p>Aliquam lorem ante, dapibus in, viverra quis, feugiat Phasellus viverra nulla ut metus varius laoreet.</p>
                                    </div>
                                </div>
                                <div className="col-lg-4">
                                    <div className="howwork aos" data-aos="fade-up" >
                                        <div className="iconround">
                                            <div className="steps">03</div>
                                            <img src="/assets/img/icon-3.png" alt="true" />
                                        </div>
                                        <h3>Amazing Places</h3>
                                        <p>Aliquam lorem ante, dapibus in, viverra quis, feugiat Phasellus viverra nulla ut metus varius laoreet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    )
}

export default HowItWorks