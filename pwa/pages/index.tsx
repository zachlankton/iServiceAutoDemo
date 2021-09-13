import Head from "next/head";
import React from "react";
import MyLayout from "components/Layout";
import theme from "components/Theme";
import Dashboard from "components/Dashboard";
import { HydraAdmin, ResourceGuesser, fetchHydra, hydraDataProvider } from "@api-platform/admin";
import { parseHydraDocumentation } from "@api-platform/api-doc-parser";

import DriveEtaIcon from '@material-ui/icons/DriveEta';
import PersonIcon from '@material-ui/icons/Person';
import BuildIcon from '@material-ui/icons/Build';

import {VehicleList, VehicleShow, VehicleEdit, VehicleCreate} from "components/Vehicles/all"
import {CustomerList, CustomerShow, CustomerEdit, CustomerCreate} from "components/Customers/all"
import {ServiceList, ServiceShow, ServiceEdit, ServiceCreate} from "components/ServiceTickets/all"

const entrypoint = process.env.NEXT_PUBLIC_ENTRYPOINT;

const dataProvider = hydraDataProvider(
    entrypoint,
    fetchHydra,
    parseHydraDocumentation,
    true // useEmbedded parameter
);

const Admin = (props) => (
  <>
    <Head>
      <title> iService Auto Demo Admin</title>
    </Head>
    <HydraAdmin
          layout={ MyLayout }
          theme={ theme }
          dataProvider={ dataProvider }
          entrypoint={ entrypoint }
          dashboard={ Dashboard }
    >
      <ResourceGuesser name="customers" list={CustomerList} show={CustomerShow} edit={CustomerEdit} create={CustomerCreate} icon={PersonIcon}/>
      <ResourceGuesser name="vehicles" list={VehicleList} show={VehicleShow} edit={VehicleEdit} create={VehicleCreate} icon={DriveEtaIcon}/>
      <ResourceGuesser name="service_tickets" list={ServiceList} show={ServiceShow} edit={ServiceEdit} create={ServiceCreate} icon={BuildIcon} />
    </HydraAdmin>
  </>
);

export default Admin;
