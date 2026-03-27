<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Company;
use App\Models\Job;
use App\Models\Level;
use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Job
        $jobs = [
                // Job 1
            [
                'title' => 'Full-Stack Developer',
                'slug' => 'full-stack-developer',
                'description' => <<<TEXT
                Airbnb was born in 2007 when two Hosts welcomed three guests to their San Francisco home, and has since grown to over 4 million Hosts who have welcomed more than 1 billion guest arrivals in almost every country across the globe. Every day, Hosts offer unique stays and experiences that make it possible for guests to connect with communities in a more authentic way.
                Airbnb is a mission-driven company dedicated to helping create a world where anyone can belong anywhere. It takes a unified team committed to our core values to achieve this goal. Airbnb's various functions embody the company's innovative spirit and our fast-moving team is committed to leading as a 21st century company.
                The Host ops tooling team focuses on creating tools and services that support home-sharing and our community of hosts in the larger ecosystem, with internal & external stakeholders. We do this by partnering with those stakeholders to create win-win solutions that support our community and benefit society at large.
                The team is developing a supply moderation platform that allows us to offer product solutions to 1000+ Operation specialists around the world that are based on our policy objectives. Our long-term goal is to be able to launch a solution in any city with minimal to no engineering effort.
                To accomplish these goals, we work closely with Legal, Data Science and Operations colleagues. This invigorating cross-functional partnership is a defining element of software engineering on the team, one that maximizes the impact of the products we build and contributes to Airbnb’s leading position in the home-sharing economy. If you are passionate about using technology to make a positive impact on the world, this is the right team for you!
                What You’ll Do
                As a Senior Software Engineer on the Host ops tooling team, your work will directly contribute to one of the most potent elements of Airbnb’s commitment to operate as a 21st-century company by enabling us to strengthen, partner with, and earn the trust of the communities we serve.

                The Ops Tooling team is part of the Guest & Host organization and supports the Hosting Supply team by developing tools and automation for supply onboarding, curation, labeling, and vetting. The Senior Engineer will work closely with cross-functional partners on Host Ops tooling, focusing on server-side development, data management, and system integration. Their responsibilities include creating robust backend systems to automate and reduce manual tasks. Additionally, they will design scalable systems and data pipelines, and collaborate with AI/ML teams to implement algorithms that enhance analytics and content classification.

                You will work with a team of talented, passionate, mission-driven developers and a diverse set of partners and stakeholders across product, design, data science, policy, operations, and legal disciplines.

                Your contributions will take a variety of forms, including:
                Building a long-term moderation platform with well-defined APIs that is service-oriented, modular, granular, observable, configurable, and efficient
                Creating highly-automated, auditable, access-controlled tools for Airbnb compliance managers to address off-platform compliance issues
                Designing intuitive experiences for hosts that make it simple for them to learn about and comply with the Airbnb’s policies
                What You’ll Need to Succeed
                6+ years of full-time work experience in software engineering, information technology, or a related domain
                Bachelor’s or Master’s degree in computer science, or equivalent experience
                Passion for delivering products end-to-end, from ideation through planning and scoping to implementation and experimental A/B testing
                Proficiency in one or more back-end server languages (Java/Ruby/C#/C++/etc.)
                Expertise in popular storage systems such as relational or noSQL databases
                Ability to write high-performance production-quality code
                Willingness to work across the stack to address technical challenges anywhere in the system
                Experience in designing and building large-scale production systems
                Knowledge of SOA (service-oriented architecture) design patterns
                Success at mentoring others and leading by example
                Strong written and verbal communication skills
                Attention to detail, bias for action, and the ability to tackle ambiguous problems
                Desire to work collaboratively in cross-functional teams with design, product, data science, policy, operations, and legal partners
                TEXT,
                'salary_from' => 80000,
                'salary_to' => 200000,
                'location' => 'San Francisco',
                'remote' => true,
                'level' => 'Senior',
                'type' => 'Full-time',
                'apply_url' => 'https://google.com',
                'company' => [
                    'name' => 'Google',
                    'logo' => 'https://cdn.sheetany.com/files/62s3Bya34W.png',
                    'website' => 'https://google.com'
                ],
                'category' => 'Engineer',
            ],
                // Job 2
            [
                'title' => 'Senior Marketing Lead',
                'slug' => 'senior-marketing-lead',
                'description' => <<<TEXT
                Airbnb was born in 2007 when two Hosts welcomed three guests to their San Francisco home, and has since grown to over 4 million Hosts who have welcomed more than 1 billion guest arrivals in almost every country across the globe. Every day, Hosts offer unique stays and experiences that make it possible for guests to connect with communities in a more authentic way.
                Airbnb is a mission-driven company dedicated to helping create a world where anyone can belong anywhere. It takes a unified team committed to our core values to achieve this goal. Airbnb's various functions embody the company's innovative spirit and our fast-moving team is committed to leading as a 21st century company.
                The Host ops tooling team focuses on creating tools and services that support home-sharing and our community of hosts in the larger ecosystem, with internal & external stakeholders. We do this by partnering with those stakeholders to create win-win solutions that support our community and benefit society at large.
                The team is developing a supply moderation platform that allows us to offer product solutions to 1000+ Operation specialists around the world that are based on our policy objectives. Our long-term goal is to be able to launch a solution in any city with minimal to no engineering effort.
                To accomplish these goals, we work closely with Legal, Data Science and Operations colleagues. This invigorating cross-functional partnership is a defining element of software engineering on the team, one that maximizes the impact of the products we build and contributes to Airbnb’s leading position in the home-sharing economy. If you are passionate about using technology to make a positive impact on the world, this is the right team for you!
                What You’ll Do
                As a Senior Software Engineer on the Host ops tooling team, your work will directly contribute to one of the most potent elements of Airbnb’s commitment to operate as a 21st-century company by enabling us to strengthen, partner with, and earn the trust of the communities we serve.

                The Ops Tooling team is part of the Guest & Host organization and supports the Hosting Supply team by developing tools and automation for supply onboarding, curation, labeling, and vetting. The Senior Engineer will work closely with cross-functional partners on Host Ops tooling, focusing on server-side development, data management, and system integration. Their responsibilities include creating robust backend systems to automate and reduce manual tasks. Additionally, they will design scalable systems and data pipelines, and collaborate with AI/ML teams to implement algorithms that enhance analytics and content classification.

                You will work with a team of talented, passionate, mission-driven developers and a diverse set of partners and stakeholders across product, design, data science, policy, operations, and legal disciplines.

                Your contributions will take a variety of forms, including:
                Building a long-term moderation platform with well-defined APIs that is service-oriented, modular, granular, observable, configurable, and efficient
                Creating highly-automated, auditable, access-controlled tools for Airbnb compliance managers to address off-platform compliance issues
                Designing intuitive experiences for hosts that make it simple for them to learn about and comply with the Airbnb’s policies
                What You’ll Need to Succeed
                6+ years of full-time work experience in software engineering, information technology, or a related domain
                Bachelor’s or Master’s degree in computer science, or equivalent experience
                Passion for delivering products end-to-end, from ideation through planning and scoping to implementation and experimental A/B testing
                Proficiency in one or more back-end server languages (Java/Ruby/C#/C++/etc.)
                Expertise in popular storage systems such as relational or noSQL databases
                Ability to write high-performance production-quality code
                Willingness to work across the stack to address technical challenges anywhere in the system
                Experience in designing and building large-scale production systems
                Knowledge of SOA (service-oriented architecture) design patterns
                Success at mentoring others and leading by example
                Strong written and verbal communication skills
                Attention to detail, bias for action, and the ability to tackle ambiguous problems
                Desire to work collaboratively in cross-functional teams with design, product, data science, policy, operations, and legal partners
                TEXT,
                'salary_from' => 90000,
                'salary_to' => 120000,
                'location' => 'London',
                'remote' => false,
                'level' => 'Middle',
                'type' => 'Internship',
                'apply_url' => 'https://amazon.com',
                'company' => [
                    'name' => 'Amazon',
                    'logo' => 'https://cdn.sheetany.com/files/l4YwwTsk1h.png',
                    'website' => 'https://amazon.com'
                ],
                'category' => 'Marketing',
            ],
                // Job 3
            [
                'title' => 'Product Manager',
                'slug' => 'product-manager',
                'description' => <<<TEXT
                Airbnb was born in 2007 when two Hosts welcomed three guests to their San Francisco home, and has since grown to over 4 million Hosts who have welcomed more than 1 billion guest arrivals in almost every country across the globe. Every day, Hosts offer unique stays and experiences that make it possible for guests to connect with communities in a more authentic way.
                Airbnb is a mission-driven company dedicated to helping create a world where anyone can belong anywhere. It takes a unified team committed to our core values to achieve this goal. Airbnb's various functions embody the company's innovative spirit and our fast-moving team is committed to leading as a 21st century company.
                The Host ops tooling team focuses on creating tools and services that support home-sharing and our community of hosts in the larger ecosystem, with internal & external stakeholders. We do this by partnering with those stakeholders to create win-win solutions that support our community and benefit society at large.
                The team is developing a supply moderation platform that allows us to offer product solutions to 1000+ Operation specialists around the world that are based on our policy objectives. Our long-term goal is to be able to launch a solution in any city with minimal to no engineering effort.
                To accomplish these goals, we work closely with Legal, Data Science and Operations colleagues. This invigorating cross-functional partnership is a defining element of software engineering on the team, one that maximizes the impact of the products we build and contributes to Airbnb’s leading position in the home-sharing economy. If you are passionate about using technology to make a positive impact on the world, this is the right team for you!
                What You’ll Do
                As a Senior Software Engineer on the Host ops tooling team, your work will directly contribute to one of the most potent elements of Airbnb’s commitment to operate as a 21st-century company by enabling us to strengthen, partner with, and earn the trust of the communities we serve.

                The Ops Tooling team is part of the Guest & Host organization and supports the Hosting Supply team by developing tools and automation for supply onboarding, curation, labeling, and vetting. The Senior Engineer will work closely with cross-functional partners on Host Ops tooling, focusing on server-side development, data management, and system integration. Their responsibilities include creating robust backend systems to automate and reduce manual tasks. Additionally, they will design scalable systems and data pipelines, and collaborate with AI/ML teams to implement algorithms that enhance analytics and content classification.

                You will work with a team of talented, passionate, mission-driven developers and a diverse set of partners and stakeholders across product, design, data science, policy, operations, and legal disciplines.

                Your contributions will take a variety of forms, including:
                Building a long-term moderation platform with well-defined APIs that is service-oriented, modular, granular, observable, configurable, and efficient
                Creating highly-automated, auditable, access-controlled tools for Airbnb compliance managers to address off-platform compliance issues
                Designing intuitive experiences for hosts that make it simple for them to learn about and comply with the Airbnb’s policies
                What You’ll Need to Succeed
                6+ years of full-time work experience in software engineering, information technology, or a related domain
                Bachelor’s or Master’s degree in computer science, or equivalent experience
                Passion for delivering products end-to-end, from ideation through planning and scoping to implementation and experimental A/B testing
                Proficiency in one or more back-end server languages (Java/Ruby/C#/C++/etc.)
                Expertise in popular storage systems such as relational or noSQL databases
                Ability to write high-performance production-quality code
                Willingness to work across the stack to address technical challenges anywhere in the system
                Experience in designing and building large-scale production systems
                Knowledge of SOA (service-oriented architecture) design patterns
                Success at mentoring others and leading by example
                Strong written and verbal communication skills
                Attention to detail, bias for action, and the ability to tackle ambiguous problems
                Desire to work collaboratively in cross-functional teams with design, product, data science, policy, operations, and legal partners
                TEXT,
                'salary_from' => 90000,
                'salary_to' => 130000,
                'location' => 'New York',
                'remote' => true,
                'level' => 'Junior',
                'type' => 'Full-time',
                'apply_url' => 'https://netflix.com',
                'company' => [
                    'name' => 'Netflix',
                    'logo' => 'https://cdn.sheetany.com/files/xHz4cTKDxe.png',
                    'website' => 'https://netflix.com'
                ],
                'category' => 'Engineer',
            ],

                // Job 4
            [
                'title' => 'IT Support Specialist',
                'slug' => 'it-support-specialist',
                'description' => <<<TEXT
                Airbnb was born in 2007 when two Hosts welcomed three guests to their San Francisco home, and has since grown to over 4 million Hosts who have welcomed more than 1 billion guest arrivals in almost every country across the globe. Every day, Hosts offer unique stays and experiences that make it possible for guests to connect with communities in a more authentic way.
                Airbnb is a mission-driven company dedicated to helping create a world where anyone can belong anywhere. It takes a unified team committed to our core values to achieve this goal. Airbnb's various functions embody the company's innovative spirit and our fast-moving team is committed to leading as a 21st century company.
                The Host ops tooling team focuses on creating tools and services that support home-sharing and our community of hosts in the larger ecosystem, with internal & external stakeholders. We do this by partnering with those stakeholders to create win-win solutions that support our community and benefit society at large.
                The team is developing a supply moderation platform that allows us to offer product solutions to 1000+ Operation specialists around the world that are based on our policy objectives. Our long-term goal is to be able to launch a solution in any city with minimal to no engineering effort.
                To accomplish these goals, we work closely with Legal, Data Science and Operations colleagues. This invigorating cross-functional partnership is a defining element of software engineering on the team, one that maximizes the impact of the products we build and contributes to Airbnb’s leading position in the home-sharing economy. If you are passionate about using technology to make a positive impact on the world, this is the right team for you!
                What You’ll Do
                As a Senior Software Engineer on the Host ops tooling team, your work will directly contribute to one of the most potent elements of Airbnb’s commitment to operate as a 21st-century company by enabling us to strengthen, partner with, and earn the trust of the communities we serve.

                The Ops Tooling team is part of the Guest & Host organization and supports the Hosting Supply team by developing tools and automation for supply onboarding, curation, labeling, and vetting. The Senior Engineer will work closely with cross-functional partners on Host Ops tooling, focusing on server-side development, data management, and system integration. Their responsibilities include creating robust backend systems to automate and reduce manual tasks. Additionally, they will design scalable systems and data pipelines, and collaborate with AI/ML teams to implement algorithms that enhance analytics and content classification.

                You will work with a team of talented, passionate, mission-driven developers and a diverse set of partners and stakeholders across product, design, data science, policy, operations, and legal disciplines.

                Your contributions will take a variety of forms, including:
                Building a long-term moderation platform with well-defined APIs that is service-oriented, modular, granular, observable, configurable, and efficient
                Creating highly-automated, auditable, access-controlled tools for Airbnb compliance managers to address off-platform compliance issues
                Designing intuitive experiences for hosts that make it simple for them to learn about and comply with the Airbnb’s policies
                What You’ll Need to Succeed
                6+ years of full-time work experience in software engineering, information technology, or a related domain
                Bachelor’s or Master’s degree in computer science, or equivalent experience
                Passion for delivering products end-to-end, from ideation through planning and scoping to implementation and experimental A/B testing
                Proficiency in one or more back-end server languages (Java/Ruby/C#/C++/etc.)
                Expertise in popular storage systems such as relational or noSQL databases
                Ability to write high-performance production-quality code
                Willingness to work across the stack to address technical challenges anywhere in the system
                Experience in designing and building large-scale production systems
                Knowledge of SOA (service-oriented architecture) design patterns
                Success at mentoring others and leading by example
                Strong written and verbal communication skills
                Attention to detail, bias for action, and the ability to tackle ambiguous problems
                Desire to work collaboratively in cross-functional teams with design, product, data science, policy, operations, and legal partners
                TEXT,
                'salary_from' => 90000,
                'salary_to' => 120000,
                'location' => 'Paris',
                'remote' => false,
                'level' => 'Senior',
                'type' => 'Part-time',
                'apply_url' => 'https://x.com',
                'company' => [
                    'name' => 'Twitter',
                    'logo' => 'https://cdn.sheetany.com/files/J7QVCQV353.png',
                    'website' => 'https://x.com'
                ],
                'category' => 'Design',
            ],

                // Job 5
            [
                'title' => 'Senior Data Engineer',
                'slug' => 'senior-data-engineer',
                'description' => <<<TEXT
                Airbnb was born in 2007 when two Hosts welcomed three guests to their San Francisco home, and has since grown to over 4 million Hosts who have welcomed more than 1 billion guest arrivals in almost every country across the globe. Every day, Hosts offer unique stays and experiences that make it possible for guests to connect with communities in a more authentic way.
                Airbnb is a mission-driven company dedicated to helping create a world where anyone can belong anywhere. It takes a unified team committed to our core values to achieve this goal. Airbnb's various functions embody the company's innovative spirit and our fast-moving team is committed to leading as a 21st century company.
                The Host ops tooling team focuses on creating tools and services that support home-sharing and our community of hosts in the larger ecosystem, with internal & external stakeholders. We do this by partnering with those stakeholders to create win-win solutions that support our community and benefit society at large.
                The team is developing a supply moderation platform that allows us to offer product solutions to 1000+ Operation specialists around the world that are based on our policy objectives. Our long-term goal is to be able to launch a solution in any city with minimal to no engineering effort.
                To accomplish these goals, we work closely with Legal, Data Science and Operations colleagues. This invigorating cross-functional partnership is a defining element of software engineering on the team, one that maximizes the impact of the products we build and contributes to Airbnb’s leading position in the home-sharing economy. If you are passionate about using technology to make a positive impact on the world, this is the right team for you!
                What You’ll Do
                As a Senior Software Engineer on the Host ops tooling team, your work will directly contribute to one of the most potent elements of Airbnb’s commitment to operate as a 21st-century company by enabling us to strengthen, partner with, and earn the trust of the communities we serve.

                The Ops Tooling team is part of the Guest & Host organization and supports the Hosting Supply team by developing tools and automation for supply onboarding, curation, labeling, and vetting. The Senior Engineer will work closely with cross-functional partners on Host Ops tooling, focusing on server-side development, data management, and system integration. Their responsibilities include creating robust backend systems to automate and reduce manual tasks. Additionally, they will design scalable systems and data pipelines, and collaborate with AI/ML teams to implement algorithms that enhance analytics and content classification.

                You will work with a team of talented, passionate, mission-driven developers and a diverse set of partners and stakeholders across product, design, data science, policy, operations, and legal disciplines.

                Your contributions will take a variety of forms, including:
                Building a long-term moderation platform with well-defined APIs that is service-oriented, modular, granular, observable, configurable, and efficient
                Creating highly-automated, auditable, access-controlled tools for Airbnb compliance managers to address off-platform compliance issues
                Designing intuitive experiences for hosts that make it simple for them to learn about and comply with the Airbnb’s policies
                What You’ll Need to Succeed
                6+ years of full-time work experience in software engineering, information technology, or a related domain
                Bachelor’s or Master’s degree in computer science, or equivalent experience
                Passion for delivering products end-to-end, from ideation through planning and scoping to implementation and experimental A/B testing
                Proficiency in one or more back-end server languages (Java/Ruby/C#/C++/etc.)
                Expertise in popular storage systems such as relational or noSQL databases
                Ability to write high-performance production-quality code
                Willingness to work across the stack to address technical challenges anywhere in the system
                Experience in designing and building large-scale production systems
                Knowledge of SOA (service-oriented architecture) design patterns
                Success at mentoring others and leading by example
                Strong written and verbal communication skills
                Attention to detail, bias for action, and the ability to tackle ambiguous problems
                Desire to work collaboratively in cross-functional teams with design, product, data science, policy, operations, and legal partners
                TEXT,
                'salary_from' => 90000,
                'salary_to' => 120000,
                'location' => 'San Francisco',
                'remote' => true,
                'level' => 'Entry',
                'type' => 'Full-time',
                'apply_url' => 'https://spotify.com',
                'company' => [
                    'name' => 'Spotify',
                    'logo' => 'https://cdn.sheetany.com/files/GLYhhICTtX.png',
                    'website' => 'https://spotify.com'
                ],
                'category' => 'Design',
            ],

                // Job 6
            [
                'title' => 'Full-Stack Developer',
                'slug' => 'full-stack-developer',
                'description' => <<<TEXT
                Airbnb was born in 2007 when two Hosts welcomed three guests to their San Francisco home, and has since grown to over 4 million Hosts who have welcomed more than 1 billion guest arrivals in almost every country across the globe. Every day, Hosts offer unique stays and experiences that make it possible for guests to connect with communities in a more authentic way.
                Airbnb is a mission-driven company dedicated to helping create a world where anyone can belong anywhere. It takes a unified team committed to our core values to achieve this goal. Airbnb's various functions embody the company's innovative spirit and our fast-moving team is committed to leading as a 21st century company.
                The Host ops tooling team focuses on creating tools and services that support home-sharing and our community of hosts in the larger ecosystem, with internal & external stakeholders. We do this by partnering with those stakeholders to create win-win solutions that support our community and benefit society at large.
                The team is developing a supply moderation platform that allows us to offer product solutions to 1000+ Operation specialists around the world that are based on our policy objectives. Our long-term goal is to be able to launch a solution in any city with minimal to no engineering effort.
                To accomplish these goals, we work closely with Legal, Data Science and Operations colleagues. This invigorating cross-functional partnership is a defining element of software engineering on the team, one that maximizes the impact of the products we build and contributes to Airbnb’s leading position in the home-sharing economy. If you are passionate about using technology to make a positive impact on the world, this is the right team for you!
                What You’ll Do
                As a Senior Software Engineer on the Host ops tooling team, your work will directly contribute to one of the most potent elements of Airbnb’s commitment to operate as a 21st-century company by enabling us to strengthen, partner with, and earn the trust of the communities we serve.

                The Ops Tooling team is part of the Guest & Host organization and supports the Hosting Supply team by developing tools and automation for supply onboarding, curation, labeling, and vetting. The Senior Engineer will work closely with cross-functional partners on Host Ops tooling, focusing on server-side development, data management, and system integration. Their responsibilities include creating robust backend systems to automate and reduce manual tasks. Additionally, they will design scalable systems and data pipelines, and collaborate with AI/ML teams to implement algorithms that enhance analytics and content classification.

                You will work with a team of talented, passionate, mission-driven developers and a diverse set of partners and stakeholders across product, design, data science, policy, operations, and legal disciplines.

                Your contributions will take a variety of forms, including:
                Building a long-term moderation platform with well-defined APIs that is service-oriented, modular, granular, observable, configurable, and efficient
                Creating highly-automated, auditable, access-controlled tools for Airbnb compliance managers to address off-platform compliance issues
                Designing intuitive experiences for hosts that make it simple for them to learn about and comply with the Airbnb’s policies
                What You’ll Need to Succeed
                6+ years of full-time work experience in software engineering, information technology, or a related domain
                Bachelor’s or Master’s degree in computer science, or equivalent experience
                Passion for delivering products end-to-end, from ideation through planning and scoping to implementation and experimental A/B testing
                Proficiency in one or more back-end server languages (Java/Ruby/C#/C++/etc.)
                Expertise in popular storage systems such as relational or noSQL databases
                Ability to write high-performance production-quality code
                Willingness to work across the stack to address technical challenges anywhere in the system
                Experience in designing and building large-scale production systems
                Knowledge of SOA (service-oriented architecture) design patterns
                Success at mentoring others and leading by example
                Strong written and verbal communication skills
                Attention to detail, bias for action, and the ability to tackle ambiguous problems
                Desire to work collaboratively in cross-functional teams with design, product, data science, policy, operations, and legal partners
                TEXT,
                'salary_from' => 110000,
                'salary_to' => 130000,
                'location' => 'Amsterdam',
                'remote' => false,
                'level' => 'Junior',
                'type' => 'Full-time',
                'apply_url' => 'https://uber.com',
                'company' => [
                    'name' => 'Uber',
                    'logo' => 'https://cdn.sheetany.com/files/lzQE1B4cnW.png',
                    'website' => 'https://uber.com'
                ],
                'category' => 'Marketing',
            ],

                // Job 7
            [
                'title' => 'Data Engineer',
                'slug' => 'data-engineer',
                'description' => <<<TEXT
                Airbnb was born in 2007 when two Hosts welcomed three guests to their San Francisco home, and has since grown to over 4 million Hosts who have welcomed more than 1 billion guest arrivals in almost every country across the globe. Every day, Hosts offer unique stays and experiences that make it possible for guests to connect with communities in a more authentic way.
                Airbnb is a mission-driven company dedicated to helping create a world where anyone can belong anywhere. It takes a unified team committed to our core values to achieve this goal. Airbnb's various functions embody the company's innovative spirit and our fast-moving team is committed to leading as a 21st century company.
                The Host ops tooling team focuses on creating tools and services that support home-sharing and our community of hosts in the larger ecosystem, with internal & external stakeholders. We do this by partnering with those stakeholders to create win-win solutions that support our community and benefit society at large.
                The team is developing a supply moderation platform that allows us to offer product solutions to 1000+ Operation specialists around the world that are based on our policy objectives. Our long-term goal is to be able to launch a solution in any city with minimal to no engineering effort.
                To accomplish these goals, we work closely with Legal, Data Science and Operations colleagues. This invigorating cross-functional partnership is a defining element of software engineering on the team, one that maximizes the impact of the products we build and contributes to Airbnb’s leading position in the home-sharing economy. If you are passionate about using technology to make a positive impact on the world, this is the right team for you!
                What You’ll Do
                As a Senior Software Engineer on the Host ops tooling team, your work will directly contribute to one of the most potent elements of Airbnb’s commitment to operate as a 21st-century company by enabling us to strengthen, partner with, and earn the trust of the communities we serve.

                The Ops Tooling team is part of the Guest & Host organization and supports the Hosting Supply team by developing tools and automation for supply onboarding, curation, labeling, and vetting. The Senior Engineer will work closely with cross-functional partners on Host Ops tooling, focusing on server-side development, data management, and system integration. Their responsibilities include creating robust backend systems to automate and reduce manual tasks. Additionally, they will design scalable systems and data pipelines, and collaborate with AI/ML teams to implement algorithms that enhance analytics and content classification.

                You will work with a team of talented, passionate, mission-driven developers and a diverse set of partners and stakeholders across product, design, data science, policy, operations, and legal disciplines.

                Your contributions will take a variety of forms, including:
                Building a long-term moderation platform with well-defined APIs that is service-oriented, modular, granular, observable, configurable, and efficient
                Creating highly-automated, auditable, access-controlled tools for Airbnb compliance managers to address off-platform compliance issues
                Designing intuitive experiences for hosts that make it simple for them to learn about and comply with the Airbnb’s policies
                What You’ll Need to Succeed
                6+ years of full-time work experience in software engineering, information technology, or a related domain
                Bachelor’s or Master’s degree in computer science, or equivalent experience
                Passion for delivering products end-to-end, from ideation through planning and scoping to implementation and experimental A/B testing
                Proficiency in one or more back-end server languages (Java/Ruby/C#/C++/etc.)
                Expertise in popular storage systems such as relational or noSQL databases
                Ability to write high-performance production-quality code
                Willingness to work across the stack to address technical challenges anywhere in the system
                Experience in designing and building large-scale production systems
                Knowledge of SOA (service-oriented architecture) design patterns
                Success at mentoring others and leading by example
                Strong written and verbal communication skills
                Attention to detail, bias for action, and the ability to tackle ambiguous problems
                Desire to work collaboratively in cross-functional teams with design, product, data science, policy, operations, and legal partners
                TEXT,
                'salary_from' => 70000,
                'salary_to' => 120000,
                'location' => 'Mountain View',
                'remote' => true,
                'level' => 'Middle',
                'type' => 'Full-time',
                'apply_url' => 'https://airbnb.com',
                'company' => [
                    'name' => 'Airbnb',
                    'logo' => 'https://cdn.sheetany.com/files/ZjTzZSfNvV.png',
                    'website' => 'https://airbnb.com'
                ],
                'category' => 'Engineer',
            ],

                // Job 8
            [
                'title' => 'Staff Software Engineer',
                'slug' => 'staff-software-engineer',
                'description' => <<<TEXT
                Airbnb was born in 2007 when two Hosts welcomed three guests to their San Francisco home, and has since grown to over 4 million Hosts who have welcomed more than 1 billion guest arrivals in almost every country across the globe. Every day, Hosts offer unique stays and experiences that make it possible for guests to connect with communities in a more authentic way.
                Airbnb is a mission-driven company dedicated to helping create a world where anyone can belong anywhere. It takes a unified team committed to our core values to achieve this goal. Airbnb's various functions embody the company's innovative spirit and our fast-moving team is committed to leading as a 21st century company.
                The Host ops tooling team focuses on creating tools and services that support home-sharing and our community of hosts in the larger ecosystem, with internal & external stakeholders. We do this by partnering with those stakeholders to create win-win solutions that support our community and benefit society at large.
                The team is developing a supply moderation platform that allows us to offer product solutions to 1000+ Operation specialists around the world that are based on our policy objectives. Our long-term goal is to be able to launch a solution in any city with minimal to no engineering effort.
                To accomplish these goals, we work closely with Legal, Data Science and Operations colleagues. This invigorating cross-functional partnership is a defining element of software engineering on the team, one that maximizes the impact of the products we build and contributes to Airbnb’s leading position in the home-sharing economy. If you are passionate about using technology to make a positive impact on the world, this is the right team for you!
                What You’ll Do
                As a Senior Software Engineer on the Host ops tooling team, your work will directly contribute to one of the most potent elements of Airbnb’s commitment to operate as a 21st-century company by enabling us to strengthen, partner with, and earn the trust of the communities we serve.

                The Ops Tooling team is part of the Guest & Host organization and supports the Hosting Supply team by developing tools and automation for supply onboarding, curation, labeling, and vetting. The Senior Engineer will work closely with cross-functional partners on Host Ops tooling, focusing on server-side development, data management, and system integration. Their responsibilities include creating robust backend systems to automate and reduce manual tasks. Additionally, they will design scalable systems and data pipelines, and collaborate with AI/ML teams to implement algorithms that enhance analytics and content classification.

                You will work with a team of talented, passionate, mission-driven developers and a diverse set of partners and stakeholders across product, design, data science, policy, operations, and legal disciplines.

                Your contributions will take a variety of forms, including:
                Building a long-term moderation platform with well-defined APIs that is service-oriented, modular, granular, observable, configurable, and efficient
                Creating highly-automated, auditable, access-controlled tools for Airbnb compliance managers to address off-platform compliance issues
                Designing intuitive experiences for hosts that make it simple for them to learn about and comply with the Airbnb’s policies
                What You’ll Need to Succeed
                6+ years of full-time work experience in software engineering, information technology, or a related domain
                Bachelor’s or Master’s degree in computer science, or equivalent experience
                Passion for delivering products end-to-end, from ideation through planning and scoping to implementation and experimental A/B testing
                Proficiency in one or more back-end server languages (Java/Ruby/C#/C++/etc.)
                Expertise in popular storage systems such as relational or noSQL databases
                Ability to write high-performance production-quality code
                Willingness to work across the stack to address technical challenges anywhere in the system
                Experience in designing and building large-scale production systems
                Knowledge of SOA (service-oriented architecture) design patterns
                Success at mentoring others and leading by example
                Strong written and verbal communication skills
                Attention to detail, bias for action, and the ability to tackle ambiguous problems
                Desire to work collaboratively in cross-functional teams with design, product, data science, policy, operations, and legal partners
                TEXT,
                'salary_from' => 90000,
                'salary_to' => 122000,
                'location' => 'London',
                'remote' => false,
                'level' => 'Junior',
                'type' => 'Full-time',
                'apply_url' => 'https://facebook.com',
                'company' => [
                    'name' => 'Facebook',
                    'logo' => 'https://cdn.sheetany.com/files/LGp55aLpA1.png',
                    'website' => 'https://facebook.com'
                ],
                'category' => 'Design',
            ],

                // Job 9
            [
                'title' => 'Front-End Developer',
                'slug' => 'front-end-developer',
                'description' => <<<TEXT
                Airbnb was born in 2007 when two Hosts welcomed three guests to their San Francisco home, and has since grown to over 4 million Hosts who have welcomed more than 1 billion guest arrivals in almost every country across the globe. Every day, Hosts offer unique stays and experiences that make it possible for guests to connect with communities in a more authentic way.
                Airbnb is a mission-driven company dedicated to helping create a world where anyone can belong anywhere. It takes a unified team committed to our core values to achieve this goal. Airbnb's various functions embody the company's innovative spirit and our fast-moving team is committed to leading as a 21st century company.
                The Host ops tooling team focuses on creating tools and services that support home-sharing and our community of hosts in the larger ecosystem, with internal & external stakeholders. We do this by partnering with those stakeholders to create win-win solutions that support our community and benefit society at large.
                The team is developing a supply moderation platform that allows us to offer product solutions to 1000+ Operation specialists around the world that are based on our policy objectives. Our long-term goal is to be able to launch a solution in any city with minimal to no engineering effort.
                To accomplish these goals, we work closely with Legal, Data Science and Operations colleagues. This invigorating cross-functional partnership is a defining element of software engineering on the team, one that maximizes the impact of the products we build and contributes to Airbnb’s leading position in the home-sharing economy. If you are passionate about using technology to make a positive impact on the world, this is the right team for you!
                What You’ll Do
                As a Senior Software Engineer on the Host ops tooling team, your work will directly contribute to one of the most potent elements of Airbnb’s commitment to operate as a 21st-century company by enabling us to strengthen, partner with, and earn the trust of the communities we serve.

                The Ops Tooling team is part of the Guest & Host organization and supports the Hosting Supply team by developing tools and automation for supply onboarding, curation, labeling, and vetting. The Senior Engineer will work closely with cross-functional partners on Host Ops tooling, focusing on server-side development, data management, and system integration. Their responsibilities include creating robust backend systems to automate and reduce manual tasks. Additionally, they will design scalable systems and data pipelines, and collaborate with AI/ML teams to implement algorithms that enhance analytics and content classification.

                You will work with a team of talented, passionate, mission-driven developers and a diverse set of partners and stakeholders across product, design, data science, policy, operations, and legal disciplines.

                Your contributions will take a variety of forms, including:
                Building a long-term moderation platform with well-defined APIs that is service-oriented, modular, granular, observable, configurable, and efficient
                Creating highly-automated, auditable, access-controlled tools for Airbnb compliance managers to address off-platform compliance issues
                Designing intuitive experiences for hosts that make it simple for them to learn about and comply with the Airbnb’s policies
                What You’ll Need to Succeed
                6+ years of full-time work experience in software engineering, information technology, or a related domain
                Bachelor’s or Master’s degree in computer science, or equivalent experience
                Passion for delivering products end-to-end, from ideation through planning and scoping to implementation and experimental A/B testing
                Proficiency in one or more back-end server languages (Java/Ruby/C#/C++/etc.)
                Expertise in popular storage systems such as relational or noSQL databases
                Ability to write high-performance production-quality code
                Willingness to work across the stack to address technical challenges anywhere in the system
                Experience in designing and building large-scale production systems
                Knowledge of SOA (service-oriented architecture) design patterns
                Success at mentoring others and leading by example
                Strong written and verbal communication skills
                Attention to detail, bias for action, and the ability to tackle ambiguous problems
                Desire to work collaboratively in cross-functional teams with design, product, data science, policy, operations, and legal partners
                TEXT,
                'salary_from' => 90000,
                'salary_to' => 120000,
                'location' => 'Paris',
                'remote' => true,
                'level' => 'Entry',
                'type' => 'Full-time',
                'apply_url' => 'https://www.instagram.com/',
                'company' => [
                    'name' => 'Instagram',
                    'logo' => 'https://cdn.sheetany.com/files/FIiM9tVTwj.png',
                    'website' => 'https://www.instagram.com/'
                ],
                'category' => 'Engineer',
            ],

                // Job 10
            [
                'title' => 'Full-Stack Developer',
                'slug' => 'full-stack-developer',
                'description' => <<<TEXT
                Airbnb was born in 2007 when two Hosts welcomed three guests to their San Francisco home, and has since grown to over 4 million Hosts who have welcomed more than 1 billion guest arrivals in almost every country across the globe. Every day, Hosts offer unique stays and experiences that make it possible for guests to connect with communities in a more authentic way.
                Airbnb is a mission-driven company dedicated to helping create a world where anyone can belong anywhere. It takes a unified team committed to our core values to achieve this goal. Airbnb's various functions embody the company's innovative spirit and our fast-moving team is committed to leading as a 21st century company.
                The Host ops tooling team focuses on creating tools and services that support home-sharing and our community of hosts in the larger ecosystem, with internal & external stakeholders. We do this by partnering with those stakeholders to create win-win solutions that support our community and benefit society at large.
                The team is developing a supply moderation platform that allows us to offer product solutions to 1000+ Operation specialists around the world that are based on our policy objectives. Our long-term goal is to be able to launch a solution in any city with minimal to no engineering effort.
                To accomplish these goals, we work closely with Legal, Data Science and Operations colleagues. This invigorating cross-functional partnership is a defining element of software engineering on the team, one that maximizes the impact of the products we build and contributes to Airbnb’s leading position in the home-sharing economy. If you are passionate about using technology to make a positive impact on the world, this is the right team for you!
                What You’ll Do
                As a Senior Software Engineer on the Host ops tooling team, your work will directly contribute to one of the most potent elements of Airbnb’s commitment to operate as a 21st-century company by enabling us to strengthen, partner with, and earn the trust of the communities we serve.

                The Ops Tooling team is part of the Guest & Host organization and supports the Hosting Supply team by developing tools and automation for supply onboarding, curation, labeling, and vetting. The Senior Engineer will work closely with cross-functional partners on Host Ops tooling, focusing on server-side development, data management, and system integration. Their responsibilities include creating robust backend systems to automate and reduce manual tasks. Additionally, they will design scalable systems and data pipelines, and collaborate with AI/ML teams to implement algorithms that enhance analytics and content classification.

                You will work with a team of talented, passionate, mission-driven developers and a diverse set of partners and stakeholders across product, design, data science, policy, operations, and legal disciplines.

                Your contributions will take a variety of forms, including:
                Building a long-term moderation platform with well-defined APIs that is service-oriented, modular, granular, observable, configurable, and efficient
                Creating highly-automated, auditable, access-controlled tools for Airbnb compliance managers to address off-platform compliance issues
                Designing intuitive experiences for hosts that make it simple for them to learn about and comply with the Airbnb’s policies
                What You’ll Need to Succeed
                6+ years of full-time work experience in software engineering, information technology, or a related domain
                Bachelor’s or Master’s degree in computer science, or equivalent experience
                Passion for delivering products end-to-end, from ideation through planning and scoping to implementation and experimental A/B testing
                Proficiency in one or more back-end server languages (Java/Ruby/C#/C++/etc.)
                Expertise in popular storage systems such as relational or noSQL databases
                Ability to write high-performance production-quality code
                Willingness to work across the stack to address technical challenges anywhere in the system
                Experience in designing and building large-scale production systems
                Knowledge of SOA (service-oriented architecture) design patterns
                Success at mentoring others and leading by example
                Strong written and verbal communication skills
                Attention to detail, bias for action, and the ability to tackle ambiguous problems
                Desire to work collaboratively in cross-functional teams with design, product, data science, policy, operations, and legal partners
                TEXT,
                'salary_from' => 100000,
                'salary_to' => 150000,
                'location' => 'New York',
                'remote' => false,
                'level' => 'Junior',
                'type' => 'Full-time',
                'apply_url' => 'https://google.com',
                'company' => [
                    'name' => 'Google',
                    'logo' => 'https://cdn.sheetany.com/files/62s3Bya34W.png',
                    'website' => 'https://google.com'
                ],
                'category' => 'Marketing',
            ],

                // Job 11
            [
                'title' => 'Product Manager',
                'slug' => 'product-manager',
                'description' => <<<TEXT
                Airbnb was born in 2007 when two Hosts welcomed three guests to their San Francisco home, and has since grown to over 4 million Hosts who have welcomed more than 1 billion guest arrivals in almost every country across the globe. Every day, Hosts offer unique stays and experiences that make it possible for guests to connect with communities in a more authentic way.
                Airbnb is a mission-driven company dedicated to helping create a world where anyone can belong anywhere. It takes a unified team committed to our core values to achieve this goal. Airbnb's various functions embody the company's innovative spirit and our fast-moving team is committed to leading as a 21st century company.
                The Host ops tooling team focuses on creating tools and services that support home-sharing and our community of hosts in the larger ecosystem, with internal & external stakeholders. We do this by partnering with those stakeholders to create win-win solutions that support our community and benefit society at large.
                The team is developing a supply moderation platform that allows us to offer product solutions to 1000+ Operation specialists around the world that are based on our policy objectives. Our long-term goal is to be able to launch a solution in any city with minimal to no engineering effort.
                To accomplish these goals, we work closely with Legal, Data Science and Operations colleagues. This invigorating cross-functional partnership is a defining element of software engineering on the team, one that maximizes the impact of the products we build and contributes to Airbnb’s leading position in the home-sharing economy. If you are passionate about using technology to make a positive impact on the world, this is the right team for you!
                What You’ll Do
                As a Senior Software Engineer on the Host ops tooling team, your work will directly contribute to one of the most potent elements of Airbnb’s commitment to operate as a 21st-century company by enabling us to strengthen, partner with, and earn the trust of the communities we serve.

                The Ops Tooling team is part of the Guest & Host organization and supports the Hosting Supply team by developing tools and automation for supply onboarding, curation, labeling, and vetting. The Senior Engineer will work closely with cross-functional partners on Host Ops tooling, focusing on server-side development, data management, and system integration. Their responsibilities include creating robust backend systems to automate and reduce manual tasks. Additionally, they will design scalable systems and data pipelines, and collaborate with AI/ML teams to implement algorithms that enhance analytics and content classification.

                You will work with a team of talented, passionate, mission-driven developers and a diverse set of partners and stakeholders across product, design, data science, policy, operations, and legal disciplines.

                Your contributions will take a variety of forms, including:
                Building a long-term moderation platform with well-defined APIs that is service-oriented, modular, granular, observable, configurable, and efficient
                Creating highly-automated, auditable, access-controlled tools for Airbnb compliance managers to address off-platform compliance issues
                Designing intuitive experiences for hosts that make it simple for them to learn about and comply with the Airbnb’s policies
                What You’ll Need to Succeed
                6+ years of full-time work experience in software engineering, information technology, or a related domain
                Bachelor’s or Master’s degree in computer science, or equivalent experience
                Passion for delivering products end-to-end, from ideation through planning and scoping to implementation and experimental A/B testing
                Proficiency in one or more back-end server languages (Java/Ruby/C#/C++/etc.)
                Expertise in popular storage systems such as relational or noSQL databases
                Ability to write high-performance production-quality code
                Willingness to work across the stack to address technical challenges anywhere in the system
                Experience in designing and building large-scale production systems
                Knowledge of SOA (service-oriented architecture) design patterns
                Success at mentoring others and leading by example
                Strong written and verbal communication skills
                Attention to detail, bias for action, and the ability to tackle ambiguous problems
                Desire to work collaboratively in cross-functional teams with design, product, data science, policy, operations, and legal partners
                TEXT,
                'salary_from' => 150000,
                'salary_to' => 200000,
                'location' => 'Tokyo',
                'remote' => true,
                'level' => 'Middle',
                'type' => 'Full-time',
                'apply_url' => 'https://x.com',
                'company' => [
                    'name' => 'Twitter',
                    'logo' => 'https://cdn.sheetany.com/files/J7QVCQV353.png',
                    'website' => 'https://x.com'
                ],
                'category' => 'Engineer',
            ],

                // Job 12
            [
                'title' => 'Full-Stack Developer',
                'slug' => 'full-stack-developer',
                'description' => <<<TEXT
                Airbnb was born in 2007 when two Hosts welcomed three guests to their San Francisco home, and has since grown to over 4 million Hosts who have welcomed more than 1 billion guest arrivals in almost every country across the globe. Every day, Hosts offer unique stays and experiences that make it possible for guests to connect with communities in a more authentic way.
                Airbnb is a mission-driven company dedicated to helping create a world where anyone can belong anywhere. It takes a unified team committed to our core values to achieve this goal. Airbnb's various functions embody the company's innovative spirit and our fast-moving team is committed to leading as a 21st century company.
                The Host ops tooling team focuses on creating tools and services that support home-sharing and our community of hosts in the larger ecosystem, with internal & external stakeholders. We do this by partnering with those stakeholders to create win-win solutions that support our community and benefit society at large.
                The team is developing a supply moderation platform that allows us to offer product solutions to 1000+ Operation specialists around the world that are based on our policy objectives. Our long-term goal is to be able to launch a solution in any city with minimal to no engineering effort.
                To accomplish these goals, we work closely with Legal, Data Science and Operations colleagues. This invigorating cross-functional partnership is a defining element of software engineering on the team, one that maximizes the impact of the products we build and contributes to Airbnb’s leading position in the home-sharing economy. If you are passionate about using technology to make a positive impact on the world, this is the right team for you!
                What You’ll Do
                As a Senior Software Engineer on the Host ops tooling team, your work will directly contribute to one of the most potent elements of Airbnb’s commitment to operate as a 21st-century company by enabling us to strengthen, partner with, and earn the trust of the communities we serve.

                The Ops Tooling team is part of the Guest & Host organization and supports the Hosting Supply team by developing tools and automation for supply onboarding, curation, labeling, and vetting. The Senior Engineer will work closely with cross-functional partners on Host Ops tooling, focusing on server-side development, data management, and system integration. Their responsibilities include creating robust backend systems to automate and reduce manual tasks. Additionally, they will design scalable systems and data pipelines, and collaborate with AI/ML teams to implement algorithms that enhance analytics and content classification.

                You will work with a team of talented, passionate, mission-driven developers and a diverse set of partners and stakeholders across product, design, data science, policy, operations, and legal disciplines.

                Your contributions will take a variety of forms, including:
                Building a long-term moderation platform with well-defined APIs that is service-oriented, modular, granular, observable, configurable, and efficient
                Creating highly-automated, auditable, access-controlled tools for Airbnb compliance managers to address off-platform compliance issues
                Designing intuitive experiences for hosts that make it simple for them to learn about and comply with the Airbnb’s policies
                What You’ll Need to Succeed
                6+ years of full-time work experience in software engineering, information technology, or a related domain
                Bachelor’s or Master’s degree in computer science, or equivalent experience
                Passion for delivering products end-to-end, from ideation through planning and scoping to implementation and experimental A/B testing
                Proficiency in one or more back-end server languages (Java/Ruby/C#/C++/etc.)
                Expertise in popular storage systems such as relational or noSQL databases
                Ability to write high-performance production-quality code
                Willingness to work across the stack to address technical challenges anywhere in the system
                Experience in designing and building large-scale production systems
                Knowledge of SOA (service-oriented architecture) design patterns
                Success at mentoring others and leading by example
                Strong written and verbal communication skills
                Attention to detail, bias for action, and the ability to tackle ambiguous problems
                Desire to work collaboratively in cross-functional teams with design, product, data science, policy, operations, and legal partners
                TEXT,
                'salary_from' => 90000,
                'salary_to' => 120000,
                'location' => 'Toronto',
                'remote' => true,
                'level' => 'Fresher',
                'type' => 'Full-time',
                'apply_url' => 'https://amazon.com',
                'company' => [
                    'name' => 'Amazon',
                    'logo' => 'https://cdn.sheetany.com/files/l4YwwTsk1h.png',
                    'website' => 'https://amazon.com'
                ],
                'category' => 'Marketing',
            ],

        ];

        foreach ($jobs as $item) {
            $company = Company::firstOrCreate(
                ['name' => $item['company']['name']],
                ['logo' => $item['company']['logo'],
                 'website' => $item['company']['website']
                ]
            );

            $location = Location::firstOrCreate(
                ['name' => $item['location']]
            );

            $level = Level::firstOrCreate(
                ['name' => $item['level']]
            );

            $category = Category::firstOrCreate(
                ['name' => $item['category']]
            );

            $job = Job::create([
                'title' => $item['title'],
                'slug' => Str::slug($item['title']) . '-' . Str::random(5),
                'description' => $item['description'],
                'salary_from' => $item['salary_from'],
                'salary_to' => $item['salary_to'],
                'is_remote' => $item['remote'],
                'type' => $item['type'],
                'apply_url' => $item['apply_url'],
                'company_id' => $company->id,
                'location_id' => $location->id,
                'level_id' => $level->id,
                'expired_at' => now()->addYear(),
            ]);

            $job->categories()->attach($category->id);

        }

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
