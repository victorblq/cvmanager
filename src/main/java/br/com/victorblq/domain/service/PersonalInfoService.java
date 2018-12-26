package br.com.victorblq.domain.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import br.com.victorblq.domain.entity.personal_info.PersonalInfo;
import br.com.victorblq.domain.repository.PersonalInfoRepository;

@Service
public class PersonalInfoService {
	
	@Autowired
	private PersonalInfoRepository personalInfoRepository;

	public PersonalInfo getPersonalInfo() {
		return new PersonalInfo();
	}
}
