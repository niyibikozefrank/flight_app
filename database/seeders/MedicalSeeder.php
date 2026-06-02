<?php

namespace Database\Seeders;

use App\Models\Medical;
use Illuminate\Database\Seeder;

class MedicalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medicines = [
            // Pain Relief & Analgesics
            ['name' => 'Paracetamol', 'category' => 'Pain Relief', 'description' => 'Acetaminophen alternative'],
            ['name' => 'Acetaminophen', 'category' => 'Pain Relief', 'description' => 'Over-the-counter pain reliever'],
            ['name' => 'Ibuprofen', 'category' => 'Pain Relief', 'description' => 'NSAID pain reliever'],
            ['name' => 'Aspirin', 'category' => 'Pain Relief', 'description' => 'Anti-inflammatory pain reliever'],
            ['name' => 'Diclofenac', 'category' => 'Pain Relief', 'description' => 'NSAID medication'],
            ['name' => 'Naproxen', 'category' => 'Pain Relief', 'description' => 'Long-acting NSAID'],
            ['name' => 'Ketorolac', 'category' => 'Pain Relief', 'description' => 'Potent NSAID'],
            ['name' => 'Celecoxib', 'category' => 'Pain Relief', 'description' => 'COX-2 inhibitor'],
            ['name' => 'Meloxicam', 'category' => 'Pain Relief', 'description' => 'NSAID with long half-life'],

            // Opioid Analgesics
            ['name' => 'Tramadol', 'category' => 'Opioid', 'description' => 'Moderate pain reliever'],
            ['name' => 'Morphine', 'category' => 'Opioid', 'description' => 'Strong opioid analgesic'],
            ['name' => 'Codeine', 'category' => 'Opioid', 'description' => 'Mild to moderate opioid'],
            ['name' => 'Oxycodone', 'category' => 'Opioid', 'description' => 'Strong opioid'],
            ['name' => 'Fentanyl', 'category' => 'Opioid', 'description' => 'Potent opioid'],

            // Antibiotics - Penicillins
            ['name' => 'Amoxicillin', 'category' => 'Antibiotic', 'description' => 'Penicillin-based antibiotic'],
            ['name' => 'Ampicillin', 'category' => 'Antibiotic', 'description' => 'Broad-spectrum penicillin'],
            ['name' => 'Penicillin', 'category' => 'Antibiotic', 'description' => 'Classic antibiotic'],

            // Antibiotics - Cephalosporins
            ['name' => 'Ceftriaxone', 'category' => 'Antibiotic', 'description' => '3rd generation cephalosporin'],
            ['name' => 'Cefixime', 'category' => 'Antibiotic', 'description' => 'Oral cephalosporin'],
            ['name' => 'Cefuroxime', 'category' => 'Antibiotic', 'description' => '2nd generation cephalosporin'],

            // Antibiotics - Macrolides
            ['name' => 'Azithromycin', 'category' => 'Antibiotic', 'description' => 'Macrolide antibiotic'],
            ['name' => 'Clarithromycin', 'category' => 'Antibiotic', 'description' => 'Macrolide antibiotic'],
            ['name' => 'Erythromycin', 'category' => 'Antibiotic', 'description' => 'Macrolide antibiotic'],

            // Antibiotics - Fluoroquinolones
            ['name' => 'Ciprofloxacin', 'category' => 'Antibiotic', 'description' => 'Fluoroquinolone antibiotic'],
            ['name' => 'Levofloxacin', 'category' => 'Antibiotic', 'description' => 'Fluoroquinolone antibiotic'],

            // Antibiotics - Others
            ['name' => 'Metronidazole', 'category' => 'Antibiotic', 'description' => 'Anti-parasitic antibiotic'],
            ['name' => 'Doxycycline', 'category' => 'Antibiotic', 'description' => 'Tetracycline antibiotic'],
            ['name' => 'Clindamycin', 'category' => 'Antibiotic', 'description' => 'Lincosamide antibiotic'],
            ['name' => 'Vancomycin', 'category' => 'Antibiotic', 'description' => 'Glycopeptide antibiotic'],
            ['name' => 'Gentamicin', 'category' => 'Antibiotic', 'description' => 'Aminoglycoside antibiotic'],

            // Antifungal
            ['name' => 'Fluconazole', 'category' => 'Antifungal', 'description' => 'Azole antifungal'],
            ['name' => 'Ketoconazole', 'category' => 'Antifungal', 'description' => 'Imidazole antifungal'],
            ['name' => 'Nystatin', 'category' => 'Antifungal', 'description' => 'Polyene antifungal'],

            // Antiviral
            ['name' => 'Acyclovir', 'category' => 'Antiviral', 'description' => 'Herpes virus treatment'],
            ['name' => 'Oseltamivir', 'category' => 'Antiviral', 'description' => 'Influenza treatment'],
            ['name' => 'Zidovudine', 'category' => 'Antiviral', 'description' => 'HIV medication'],
            ['name' => 'Tenofovir', 'category' => 'Antiviral', 'description' => 'HIV medication'],
            ['name' => 'Lamivudine', 'category' => 'Antiviral', 'description' => 'HIV medication'],

            // Antimalarial
            ['name' => 'Artemether', 'category' => 'Antimalarial', 'description' => 'Artemisinin derivative'],
            ['name' => 'Lumefantrine', 'category' => 'Antimalarial', 'description' => 'Artemisinin partner'],
            ['name' => 'Quinine', 'category' => 'Antimalarial', 'description' => 'Classic antimalarial'],
            ['name' => 'Chloroquine', 'category' => 'Antimalarial', 'description' => 'Common antimalarial'],

            // Antihelmintic
            ['name' => 'Albendazole', 'category' => 'Antihelmintic', 'description' => 'Broad-spectrum antihelmintic'],
            ['name' => 'Mebendazole', 'category' => 'Antihelmintic', 'description' => 'Antihelmintic medication'],

            // Gastrointestinal
            ['name' => 'Omeprazole', 'category' => 'Gastrointestinal', 'description' => 'Proton pump inhibitor'],
            ['name' => 'Pantoprazole', 'category' => 'Gastrointestinal', 'description' => 'Proton pump inhibitor'],
            ['name' => 'Esomeprazole', 'category' => 'Gastrointestinal', 'description' => 'Proton pump inhibitor'],
            ['name' => 'Ranitidine', 'category' => 'Gastrointestinal', 'description' => 'H2 receptor antagonist'],
            ['name' => 'Antacid', 'category' => 'Gastrointestinal', 'description' => 'Acid neutralizer'],
            ['name' => 'Metoclopramide', 'category' => 'Gastrointestinal', 'description' => 'Anti-nausea medication'],
            ['name' => 'Ondansetron', 'category' => 'Gastrointestinal', 'description' => 'Anti-nausea medication'],
            ['name' => 'Loperamide', 'category' => 'Gastrointestinal', 'description' => 'Anti-diarrheal'],
            ['name' => 'Oral Rehydration Salts (ORS)', 'category' => 'Gastrointestinal', 'description' => 'Electrolyte replacement'],

            // Endocrine
            ['name' => 'Insulin', 'category' => 'Endocrine', 'description' => 'Diabetes treatment'],
            ['name' => 'Metformin', 'category' => 'Endocrine', 'description' => 'Type 2 diabetes medication'],
            ['name' => 'Glibenclamide', 'category' => 'Endocrine', 'description' => 'Sulfonylurea diabetes drug'],
            ['name' => 'Glimepiride', 'category' => 'Endocrine', 'description' => 'Sulfonylurea diabetes drug'],

            // Cardiovascular
            ['name' => 'Amlodipine', 'category' => 'Cardiovascular', 'description' => 'Calcium channel blocker'],
            ['name' => 'Losartan', 'category' => 'Cardiovascular', 'description' => 'ARB antihypertensive'],
            ['name' => 'Enalapril', 'category' => 'Cardiovascular', 'description' => 'ACE inhibitor'],
            ['name' => 'Lisinopril', 'category' => 'Cardiovascular', 'description' => 'ACE inhibitor'],
            ['name' => 'Atenolol', 'category' => 'Cardiovascular', 'description' => 'Beta-blocker'],
            ['name' => 'Propranolol', 'category' => 'Cardiovascular', 'description' => 'Non-selective beta-blocker'],
            ['name' => 'Hydrochlorothiazide', 'category' => 'Cardiovascular', 'description' => 'Diuretic'],
            ['name' => 'Furosemide', 'category' => 'Cardiovascular', 'description' => 'Loop diuretic'],
            ['name' => 'Spironolactone', 'category' => 'Cardiovascular', 'description' => 'Potassium-sparing diuretic'],
            ['name' => 'Atorvastatin', 'category' => 'Cardiovascular', 'description' => 'Statin cholesterol drug'],
            ['name' => 'Simvastatin', 'category' => 'Cardiovascular', 'description' => 'Statin cholesterol drug'],
            ['name' => 'Clopidogrel', 'category' => 'Cardiovascular', 'description' => 'Antiplatelet agent'],
            ['name' => 'Heparin', 'category' => 'Cardiovascular', 'description' => 'Anticoagulant'],
            ['name' => 'Warfarin', 'category' => 'Cardiovascular', 'description' => 'Anticoagulant'],

            // Respiratory
            ['name' => 'Salbutamol', 'category' => 'Respiratory', 'description' => 'Bronchodilator'],
            ['name' => 'Albuterol', 'category' => 'Respiratory', 'description' => 'Bronchodilator'],
            ['name' => 'Beclomethasone', 'category' => 'Respiratory', 'description' => 'Inhaled corticosteroid'],

            // Steroids & Immunosuppressants
            ['name' => 'Prednisolone', 'category' => 'Steroid', 'description' => 'Corticosteroid'],
            ['name' => 'Dexamethasone', 'category' => 'Steroid', 'description' => 'Corticosteroid'],
            ['name' => 'Hydrocortisone', 'category' => 'Steroid', 'description' => 'Topical corticosteroid'],

            // Antihistamines & Allergies
            ['name' => 'Cetirizine', 'category' => 'Antihistamine', 'description' => 'Non-sedating antihistamine'],
            ['name' => 'Loratadine', 'category' => 'Antihistamine', 'description' => 'Non-sedating antihistamine'],
            ['name' => 'Chlorpheniramine', 'category' => 'Antihistamine', 'description' => 'Sedating antihistamine'],
            ['name' => 'Diphenhydramine', 'category' => 'Antihistamine', 'description' => 'Sedating antihistamine'],

            // Emergency Medications
            ['name' => 'Adrenaline', 'category' => 'Emergency', 'description' => 'Epinephrine for emergencies'],
            ['name' => 'Epinephrine', 'category' => 'Emergency', 'description' => 'Emergency cardiac medication'],

            // Psychotropic Medications
            ['name' => 'Diazepam', 'category' => 'Psychotropic', 'description' => 'Benzodiazepine sedative'],
            ['name' => 'Lorazepam', 'category' => 'Psychotropic', 'description' => 'Benzodiazepine anxiolytic'],
            ['name' => 'Alprazolam', 'category' => 'Psychotropic', 'description' => 'Benzodiazepine anxiolytic'],
            ['name' => 'Fluoxetine', 'category' => 'Psychotropic', 'description' => 'SSRI antidepressant'],
            ['name' => 'Sertraline', 'category' => 'Psychotropic', 'description' => 'SSRI antidepressant'],
            ['name' => 'Amitriptyline', 'category' => 'Psychotropic', 'description' => 'Tricyclic antidepressant'],
            ['name' => 'Haloperidol', 'category' => 'Psychotropic', 'description' => 'Antipsychotic'],
            ['name' => 'Risperidone', 'category' => 'Psychotropic', 'description' => 'Atypical antipsychotic'],

            // Vitamins & Minerals
            ['name' => 'Vitamin C', 'category' => 'Vitamin', 'description' => 'Ascorbic acid'],
            ['name' => 'Vitamin D', 'category' => 'Vitamin', 'description' => 'Cholecalciferol'],
            ['name' => 'Vitamin B Complex', 'category' => 'Vitamin', 'description' => 'B vitamins combination'],
            ['name' => 'Folic Acid', 'category' => 'Vitamin', 'description' => 'Vitamin B9'],
            ['name' => 'Ferrous Sulfate', 'category' => 'Mineral', 'description' => 'Iron supplement'],
            ['name' => 'Calcium Carbonate', 'category' => 'Mineral', 'description' => 'Calcium supplement'],
            ['name' => 'Zinc Sulfate', 'category' => 'Mineral', 'description' => 'Zinc supplement'],
            ['name' => 'Magnesium Hydroxide', 'category' => 'Mineral', 'description' => 'Magnesium laxative'],

            // Thyroid
            ['name' => 'Levothyroxine', 'category' => 'Thyroid', 'description' => 'Thyroid hormone replacement'],

            // Anticonvulsants
            ['name' => 'Carbamazepine', 'category' => 'Anticonvulsant', 'description' => 'Epilepsy medication'],
            ['name' => 'Sodium Valproate', 'category' => 'Anticonvulsant', 'description' => 'Epilepsy medication'],
            ['name' => 'Phenytoin', 'category' => 'Anticonvulsant', 'description' => 'Epilepsy medication'],

            // Urinary
            ['name' => 'Nitrofurantoin', 'category' => 'Urinary', 'description' => 'UTI antibiotic'],
            ['name' => 'Tamsulosin', 'category' => 'Urinary', 'description' => 'BPH medication'],

            // Sexual Health
            ['name' => 'Sildenafil', 'category' => 'Sexual Health', 'description' => 'ED medication'],

            // Obstetrics
            ['name' => 'Oxytocin', 'category' => 'Obstetrics', 'description' => 'Labor induction'],
            ['name' => 'Misoprostol', 'category' => 'Obstetrics', 'description' => 'Uterine contraction'],
            ['name' => 'Medroxyprogesterone', 'category' => 'Contraception', 'description' => 'Contraceptive'],
            ['name' => 'Ethinyl Estradiol', 'category' => 'Contraception', 'description' => 'Oral contraceptive'],

            // Insulin Preparations
            ['name' => 'Insulin Glargine', 'category' => 'Endocrine', 'description' => 'Long-acting insulin'],
            ['name' => 'Insulin Regular', 'category' => 'Endocrine', 'description' => 'Short-acting insulin'],

            // Topical Antiseptics
            ['name' => 'Gentian Violet', 'category' => 'Antiseptic', 'description' => 'Topical antiseptic'],
            ['name' => 'Povidone Iodine', 'category' => 'Antiseptic', 'description' => 'Iodine antiseptic'],
            ['name' => 'Hydrogen Peroxide', 'category' => 'Antiseptic', 'description' => 'Disinfectant'],
            ['name' => 'Chlorhexidine', 'category' => 'Antiseptic', 'description' => 'Broad-spectrum antiseptic'],
            ['name' => 'Silver Sulfadiazine', 'category' => 'Antiseptic', 'description' => 'Burn treatment'],

            // Local Anesthetics
            ['name' => 'Lidocaine', 'category' => 'Anesthetic', 'description' => 'Local anesthetic'],
            ['name' => 'Bupivacaine', 'category' => 'Anesthetic', 'description' => 'Local anesthetic'],

            // General Anesthetics
            ['name' => 'Propofol', 'category' => 'Anesthetic', 'description' => 'IV anesthetic'],
            ['name' => 'Thiopental', 'category' => 'Anesthetic', 'description' => 'Barbiturate anesthetic'],
            ['name' => 'Ketamine', 'category' => 'Anesthetic', 'description' => 'Dissociative anesthetic'],

            // Cardiac
            ['name' => 'Nitroglycerin', 'category' => 'Cardiac', 'description' => 'Angina relief'],
            ['name' => 'Digoxin', 'category' => 'Cardiac', 'description' => 'Heart failure medication'],
            ['name' => 'Dopamine', 'category' => 'Cardiac', 'description' => 'Inotropic agent'],
            ['name' => 'Dobutamine', 'category' => 'Cardiac', 'description' => 'Inotropic agent'],
            ['name' => 'Amiodarone', 'category' => 'Cardiac', 'description' => 'Antiarrhythmic'],
            ['name' => 'Verapamil', 'category' => 'Cardiac', 'description' => 'Calcium channel blocker'],
            ['name' => 'Diltiazem', 'category' => 'Cardiac', 'description' => 'Calcium channel blocker'],

            // Respiratory Advanced
            ['name' => 'Montelukast', 'category' => 'Respiratory', 'description' => 'Asthma controller'],
            ['name' => 'Budesonide', 'category' => 'Respiratory', 'description' => 'Inhaled steroid'],
            ['name' => 'Ipratropium', 'category' => 'Respiratory', 'description' => 'Anticholinergic bronchodilator'],
            ['name' => 'Tiotropium', 'category' => 'Respiratory', 'description' => 'COPD maintenance'],

            // TB Medications
            ['name' => 'Rifampicin', 'category' => 'TB', 'description' => 'TB first-line drug'],
            ['name' => 'Isoniazid', 'category' => 'TB', 'description' => 'TB first-line drug'],
            ['name' => 'Pyrazinamide', 'category' => 'TB', 'description' => 'TB first-line drug'],
            ['name' => 'Ethambutol', 'category' => 'TB', 'description' => 'TB first-line drug'],

            // Sulfonamides
            ['name' => 'Sulfamethoxazole', 'category' => 'Antibiotic', 'description' => 'Sulfonamide antibiotic'],
            ['name' => 'Trimethoprim', 'category' => 'Antibiotic', 'description' => 'Dihydrofolate reductase inhibitor'],
            ['name' => 'Co-trimoxazole', 'category' => 'Antibiotic', 'description' => 'TMP-SMX combination'],

            // Beta-lactams Advanced
            ['name' => 'Meropenem', 'category' => 'Antibiotic', 'description' => 'Carbapenem antibiotic'],
            ['name' => 'Imipenem', 'category' => 'Antibiotic', 'description' => 'Carbapenem antibiotic'],
            ['name' => 'Piperacillin', 'category' => 'Antibiotic', 'description' => 'Extended-spectrum penicillin'],
            ['name' => 'Tazobactam', 'category' => 'Antibiotic', 'description' => 'Beta-lactamase inhibitor'],

            // Other Antibiotics
            ['name' => 'Linezolid', 'category' => 'Antibiotic', 'description' => 'Oxazolidinone antibiotic'],
            ['name' => 'Colistin', 'category' => 'Antibiotic', 'description' => 'Last-resort antibiotic'],

            // Immunosuppressants
            ['name' => 'Tacrolimus', 'category' => 'Immunosuppressant', 'description' => 'Calcineurin inhibitor'],
            ['name' => 'Cyclosporine', 'category' => 'Immunosuppressant', 'description' => 'Calcineurin inhibitor'],

            // DMARDs
            ['name' => 'Methotrexate', 'category' => 'DMARD', 'description' => 'Rheumatoid arthritis drug'],
            ['name' => 'Hydroxychloroquine', 'category' => 'DMARD', 'description' => 'Autoimmune disease drug'],

            // Gout
            ['name' => 'Allopurinol', 'category' => 'Gout', 'description' => 'Uric acid lowering drug'],
            ['name' => 'Colchicine', 'category' => 'Gout', 'description' => 'Gout attack treatment'],

            // Male Urinary
            ['name' => 'Finasteride', 'category' => 'Urinary', 'description' => '5-alpha reductase inhibitor'],
            ['name' => 'Dutasteride', 'category' => 'Urinary', 'description' => '5-alpha reductase inhibitor'],

            // Other Psychotropics
            ['name' => 'Escitalopram', 'category' => 'Psychotropic', 'description' => 'SSRI antidepressant'],
            ['name' => 'Venlafaxine', 'category' => 'Psychotropic', 'description' => 'SNRI antidepressant'],
            ['name' => 'Duloxetine', 'category' => 'Psychotropic', 'description' => 'SNRI antidepressant'],
            ['name' => 'Olanzapine', 'category' => 'Psychotropic', 'description' => 'Atypical antipsychotic'],
            ['name' => 'Quetiapine', 'category' => 'Psychotropic', 'description' => 'Atypical antipsychotic'],
            ['name' => 'Clozapine', 'category' => 'Psychotropic', 'description' => 'Atypical antipsychotic'],
            ['name' => 'Zolpidem', 'category' => 'Psychotropic', 'description' => 'Sleep aid'],
            ['name' => 'Melatonin', 'category' => 'Psychotropic', 'description' => 'Natural sleep aid'],

            // Smoking Cessation
            ['name' => 'Nicotine Patch', 'category' => 'Smoking Cessation', 'description' => 'Nicotine replacement'],

            // Vaccines
            ['name' => 'BCG Vaccine', 'category' => 'Vaccine', 'description' => 'TB vaccine'],
            ['name' => 'Tetanus Vaccine', 'category' => 'Vaccine', 'description' => 'Tetanus immunization'],
            ['name' => 'Rabies Vaccine', 'category' => 'Vaccine', 'description' => 'Rabies immunization'],
            ['name' => 'Hepatitis B Vaccine', 'category' => 'Vaccine', 'description' => 'Hepatitis B immunization'],
            ['name' => 'Polio Vaccine', 'category' => 'Vaccine', 'description' => 'Polio immunization'],
            ['name' => 'Measles Vaccine', 'category' => 'Vaccine', 'description' => 'Measles immunization'],
            ['name' => 'COVID-19 Vaccine', 'category' => 'Vaccine', 'description' => 'COVID-19 immunization'],
            ['name' => 'Influenza Vaccine', 'category' => 'Vaccine', 'description' => 'Flu shot'],
        ];

        foreach ($medicines as $medicine) {
            Medical::updateOrCreate(
                ['name' => $medicine['name']],
                $medicine
            );
        }
    }
}
