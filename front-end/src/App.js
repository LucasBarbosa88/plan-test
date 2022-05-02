import * as React from "react";
import logo from './logo.svg';
import './App.css';
import 'bootstrap/dist/css/bootstrap.css';
import Navbar from "react-bootstrap/Navbar";
import Container from "react-bootstrap/Container";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";

import { BrowserRouter as Router , Routes, Route, Link } from "react-router-dom";

import EditHouseHoldAppliance from "./components/householdAppliance/edit.component";
import HouseholdApplianceList from "./components/householdAppliance/list.component";
import CreateHolseholdAppliance from "./components/householdAppliance/create.component";
function App() {
  return (
  <Router>
    <Navbar bg="primary">
      <Container>
        <Link to={"/"} className="navbar-brand text-white">
          Test Crud App
        </Link>
      </Container>
    </Navbar>
    <Container className="mt-5">
      <Row>
        <Col md={12}>
          <Routes>
            <Route path="/householdAppliance/create" element={<CreateHolseholdAppliance />} />
            <Route path="/householdAppliance/edit/:id" element={<EditHouseHoldAppliance />} />
            <Route exact path='/householdAppliance' element={<HouseholdApplianceList />} />
          </Routes>
        </Col>
      </Row>
    </Container>
  </Router>);
}

export default App;
