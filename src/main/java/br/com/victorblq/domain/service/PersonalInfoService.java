package br.com.victorblq.domain.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;

import br.com.victorblq.domain.entity.personal_info.Email;
import br.com.victorblq.domain.entity.personal_info.PersonalInfo;
import br.com.victorblq.domain.entity.personal_info.Phone;
import br.com.victorblq.domain.entity.personal_info.Reference;
import br.com.victorblq.domain.repository.EmailRepository;
import br.com.victorblq.domain.repository.PersonalInfoRepository;
import br.com.victorblq.domain.repository.PhoneRepository;
import br.com.victorblq.domain.repository.ReferenceRepository;

@Service
public class PersonalInfoService {
	
	@Value("${upload.paths.image}")
	private String imgUploadPath;
	
	@Autowired
	private PersonalInfoRepository personalInfoRepository;
	@Autowired
	private PhoneRepository phoneRepository;
	@Autowired
	private EmailRepository emailRepository;
	@Autowired
	private ReferenceRepository referenceRepository;

	public PersonalInfo getPersonalInfo() {
		return this.personalInfoRepository.findAll().get(0);
	}

	public PersonalInfo updatePersonalInfo(PersonalInfo personalInfo) {
		PersonalInfo savedPersonalInfo = this.getPersonalInfo();
		
		savedPersonalInfo.update(personalInfo);
		
		return this.personalInfoRepository.save(savedPersonalInfo);
	}

	/**
	 * Phone
	 */
	public PersonalInfo addPhone(Phone phone) {
		PersonalInfo savedPersonalInfo = this.getPersonalInfo();
		phone.setPersonalInfo(savedPersonalInfo);
		
		this.phoneRepository.save(phone);
		
		return this.getPersonalInfo();
	}
	
	public void removePhone(Long phoneId) {
		this.phoneRepository.deleteById(phoneId);
	}
	
	/**
	 * Email
	 */
	public PersonalInfo addEmail(Email email) {
		PersonalInfo savedPersonalInfo = this.getPersonalInfo();
		email.setPersonalInfo(savedPersonalInfo);
		
		this.emailRepository.save(email);
		
		return this.getPersonalInfo();
	}
	
	public void removeEmail(Long emailId) {
		this.emailRepository.deleteById(emailId);
	}
	
	/**
	 * Reference
	 */
	public PersonalInfo addReference(Reference reference) {
		PersonalInfo savedPersonalInfo = this.getPersonalInfo();
		reference.setPersonalInfo(savedPersonalInfo);
		
		this.referenceRepository.save(reference);
		
		return this.getPersonalInfo();
	}
	
	public void removeReference(Long referenceId) {
		this.referenceRepository.deleteById(referenceId);
	}
	
	/**
	 * Image
	 */
	public PersonalInfo updateImage(String image) {
		PersonalInfo savedPersonalInfo = this.getPersonalInfo();
		
		savedPersonalInfo.setImage(this.imgUploadPath + "/" + image);
		
		return this.personalInfoRepository.save(savedPersonalInfo);
	}
}