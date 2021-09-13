import { Edit } from 'react-admin';
import ServiceForm from "components/ServiceTickets/ServiceForm"

const ServiceEdit = (props) => (
    <>
    <h1>Edit Service Tickets</h1>
    <Edit {...props} title="Service Tickets" >
        <ServiceForm />
    </Edit>
    </>
)

export default ServiceEdit;
