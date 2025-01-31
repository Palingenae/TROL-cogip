<?php
    namespace App\Controller;

    use App\Controller\CircularReferenceHandlers\CompanyCircularReferenceHandler;
    use App\Controller\CircularReferenceHandlers\ContactCircularReferenceHandler;
    use App\Controller\CircularReferenceHandlers\InvoiceCircularReferenceHandler;
    use App\Repository\ContactRepository;
    use App\Repository\InvoiceRepository;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Attribute\Route;
    use Symfony\Component\Serializer\Encoder\JsonEncoder;
    use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
    use Symfony\Component\Serializer\SerializerInterface;

    #[Route('/home', name: 'home_')]
    class HomeController extends AbstractController
    {
        #[Route('/invoices/{nRequests}', name: 'invoices', methods: ['GET'])]
        public function latestInvoices(SerializerInterface $serializer, InvoiceRepository $invoiceRepository, int $nRequests = 5): JsonResponse
        {
            $invoices = $invoiceRepository->findBy([], ['created_at' => 'DESC'], $nRequests);

            if (!$invoices) {
                throw $this->createNotFoundException('Invoices table is empty or not found !');
            }

            $json = $serializer->serialize($invoices, JsonEncoder::FORMAT, [AbstractNormalizer::ATTRIBUTES => ['ref', 'company' => ['name'], 'created_at']]);
            return JsonResponse::fromJsonString($json);
        }

        #[Route('/contacts/{nRequests}', name: 'contacts', methods: ['GET'])]
        public function latestContacts(SerializerInterface $serializer, ContactRepository $contactRepository, int $nRequests = 5): JsonResponse
        {
            $contacts = $contactRepository->findBy([], ['created_at' => 'DESC'], $nRequests);

            if (!$contacts) {
                throw $this->createNotFoundException('Contacts table is empty or not found !');
            }

            $json = $serializer->serialize($contacts, JsonEncoder::FORMAT, ContactCircularReferenceHandler::getContext());
            return new JsonResponse($json);
        }

        #[Route('/companies/{nRequests}', name: 'companies', methods: ['GET'])]
        public function latestCompanies(SerializerInterface $serializer, ContactRepository $companyRepository, int $nRequests = 5): JsonResponse
        {
            $companies = $companyRepository->findBy([], ['created_at' => 'DESC'], $nRequests);

            if (!$companies) {
                throw $this->createNotFoundException('Companies table is empty or not found !');
            }

            $json = $serializer->serialize($companies, JsonEncoder::FORMAT, CompanyCircularReferenceHandler::getContext());
            return new JsonResponse($json);
        }
    }
?>
