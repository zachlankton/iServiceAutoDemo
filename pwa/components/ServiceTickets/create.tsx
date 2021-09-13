import { Create } from 'react-admin';
import ServiceForm from "components/ServiceTickets/ServiceForm"

const ServiceCreate = (props) => (
    <>
    <h1>Create Service Tickets</h1>
    <Create {...props} title="Service Tickets" >
        <ServiceForm />
    </Create>
    </>
)

export default ServiceCreate;